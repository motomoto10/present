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
            // ユーザの投稿の一覧を作成日時の降順で取得
            $giving_users = $user->giving_users()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'giving_users' => $giving_users,
            ];
        }
        
        return view('welcome',$data);
    
    }
    
    public function create()
    {
        return view('giving_users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'relation' => 'required|max:255',
        ]);
        
        $request->user()->giving_users()->create([
            'name' => $request->name,
            'relation' => $request->relation,
            ]);
            
            return redirect('/');
    }
    
    public function destroy($id)
    {
        $giving_user = \App\Giving_user::findOrFail($id);
        
        if(\Auth::id() === $giving_user->user_id) {
            $giving_user->delete();
        }
        
        return back();
    }
    

    
    public function show()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $giving_users = $user->giving_users()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'giving_users' => $giving_users,
            ];
        }
        
        return view('giving_users.show');
    }
}