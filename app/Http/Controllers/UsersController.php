<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Giving_user;
use App\Anniversary;
use App\Present;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(20);
        
        // ユーザの投稿の一覧を作成日時の降順で取得

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $user,
        ]);

    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,

        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        $genders = Giving_user::$genders;
        
        return view('users.edit',compact('user','genders'));
        
    }
    
        public function update(Request $request,$id)
    {
        if (\Auth::check()) {
            
            \Auth::user();
                
            $request->validate([
                'name' => 'required|max:255',
            ]);
            
            $user = User::findOrFail($id);
            $user->name  = $request->name;
            $user->gender  = $request->gender;
            $user->born  = $request->born;
            $user->myself  = $request->myself;
            $user->save();
                
            return redirect('/');
        }
        
    }
    
    public function giving_users($user_id)
    {
        $user = User::findOrFail($user_id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // 登録されたユーザーを取得
        $giving_users = Giving_user::where('user_id',$user_id)->get();

        // フォロー一覧ビューでそれらを表示
        return view('users.giving_user',[
            'user' => $user,
            'giving_users' => $giving_users,
        ]);
    }
    
    public function anniversaries($user_id)
    {
        $user = User::findOrFail($user_id);
        
        // 関係するモデルの件数ロード
        $user->loadRelationshipCounts();
        // 登録されたユーザーを取得
        $giving_users = Giving_user::where('user_id',$user_id)->get();
        
        // 一覧ビューでそれらを表示
        return view('users.anniversary',[
            'user' => $user,
            'giving_users' => $giving_users,
        ]);
    }
    
    public function presents($user_id)
    {
        $user = User::findOrFail($user_id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // ユーザの投稿したユーザーを取得
        $giving_users = Giving_user::where('user_id',$user_id)->get();
        
        $anniversary = Anniversary::where('user_id',$user_id)->get();
        
        $present = Present::where('anniversary_id',$anniversary[0]->id)->get();
        
        // フォロー一覧ビューでそれらを表示
        return view('users.presents',[
            'user' => $user,
            'giving_users' => $giving_users,
            'anniversary'=> $anniversary,
            'present' => $present,
        ]);
    }
    
    public function presentlist()
    {
        
        $presents = \App\Present::get();
        
        
        $anniversaryId = $presents->pluck('anniversary_id')->toArray();
        
        $anniversary = \App\Anniversary::findOrFail($anniversaryId);
        
        // 一覧ビューでそれらを表示
        return view('users.presentlist',[
            'anniversaries' => $anniversary,
        ]);
    }

}