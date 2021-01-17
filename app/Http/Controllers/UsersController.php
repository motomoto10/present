<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(10);
        
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
        
        $giving_users = $user->giving_users()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'giving_users' => $giving_users,
        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
         return view('users.edit', [
            'user' => $user,
        ]);
        
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
            $user->save();
                
            return redirect('/');
        }
        
    }
    

}