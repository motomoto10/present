<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Giving_user;
use App\Anniversary;

class Giving_usersController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $userId = $user->id;
            
            // ユーザの投稿の一覧を作成日時の降順で取得
            $anniversaries = Anniversary::where('user_id',$userId)->orderBy('day', 'asc')->take(3)->get();
            
            $data = [
                'user' => $user,
                'anniversaries' => $anniversaries,
            ];
        }
        
        return view('welcome',$data);
    
    }
    
    public function create()
    {
        $genders = Giving_user::$genders;
        
        $relation = Giving_user::$relation;
        
        $old = Giving_user::$old;

        
        return view('giving_users.create',compact( 'genders','relation','old'));
    }
    
    public function edit($giving_user)
    {
        $giving_user =Giving_user::findOrFail($giving_user);
        
        $genders = Giving_user::$genders;
        
        $relation = Giving_user::$relation;
        
        $old = Giving_user::$old;

        
        return view('giving_users.edit',compact( 'giving_user','genders','relation','old'));
    }
    
    public function update(Request $request,$giving_user)
    {
        
        $giving_user = Giving_user::findOrFail($giving_user);
        
        $request->validate([
            'name' => 'required|max:25',
            'relation' => 'required|max:25',
            'gender' => 'required|max:25',
            'old' => 'required|max:25',
        ]);
        
        $giving_user->update([
            'name' => $request->name,
            'relation' => $request->relation,
            'gender' => $request->gender,
            'old' => $request->old,
            ]);
            
            return redirect('/');
    }
    
    public function show($id)
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            $giving_user = \App\Giving_user::findOrFail($id);

            $data = [
                'giving_user' => $giving_user,
            ];
        }
        
        return view('giving_users.show',$data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25',
            'relation' => 'required|max:25',
            'gender' => 'required|max:25',
            'old' => 'required|max:25',
        ]);
        
        $request->user()->giving_users()->create([
            'name' => $request->name,
            'relation' => $request->relation,
            'gender' => $request->gender,
            'old' => $request->old,
            ]);
            
            return redirect('/');
    }
    
    public function destroy($id)
    {
        $giving_user = \App\Giving_user::findOrFail($id);
        
        if(\Auth::id() === $giving_user->user_id) {
            $giving_user->delete();
        }
        
            return redirect('/');
    }

}