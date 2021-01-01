<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Giving_user;

use App\anniversary;

class AnniversariesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $anniversaries = $user->giving_users()->anniversaries()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'anniversaries' => $anniversaries,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'anniversary' => 'required|max:255',
            'day' => 'required|max:255',
        ]);
        
        $request->user()->giving_users()->anniversaries()->create([
            'anniversary' => $request->anniversary,
            'day' => $request->day,
            ]);
            
        return back();
    }
    
    public function destroy($id)
    {
        $anniversary = \App\anniversary::findOrFail($id);
        
        if(\Auth::id() === $anniversary->giving_user_id) {
            $anniversary->delete();
        }
        
        return back();
    }
    
    public function anniversariesForm()
    {
        return view('anniversaries.form');
    }
    
}
