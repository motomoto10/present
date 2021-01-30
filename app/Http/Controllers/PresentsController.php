<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Present;
use APP\User;
use App\Anniversary;

class PresentsController extends Controller
{
    public function create($id, $anniversary)
    {
        
        $anniversaries = \App\Anniversary::findOrFail($anniversary);
        
        $present = new Present;
        
        return view('presents.create',[
            'anniversary'=> $anniversaries,
            'present' => $present,
            ]);
    }
    
    public function store(Request $request,$id,$anniversary)
    {
        
        if (\Auth::check()) {
            
            \Auth::user();
                
            $request->validate([
                'present' => 'required|max:255',
                'year' => 'required|max:255',
                'explain' => 'required|max:255',
            ]);
            
            $present = new Present;
            $present->anniversary_id = $anniversary;
            $present->present = $request->present;
            $present->year = $request->year;
            $present->explain = $request->explain;
            $present->save();
                
            return redirect('/');
        }
    }
    
    public function destroy($present,$anniversary,$id)
    {
        $anniversary =  \App\Anniversary::findOrFail($anniversary);
        
        $presents = Present::findOrFail($id);
        
        if(\Auth::user()->id === $anniversary->user_id) {
            $presents->delete();
        }
        
        return redirect('/');
    }
    
    public function favorite_present($user_id)
    {
        $user = User::findOrFail($user_id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        // ユーザのいいねしたプレゼントを取得
        $favorits = $user->favorites()->paginate(10);
        
        // フォロー一覧ビューでそれらを表示
        return view('users.favorites',[
            'user' => $user,
            'presents' => $favorits,
        ]);
   }
   
       public function show($present,$anniversary,$id)
    {   
        $presents = Present::findOrFail($id);
        
        $anniversary = Anniversary::findOrFail($anniversary);
        
        // 一覧ビューでそれらを表示
        return view('presents.show',[
            'anniversary' => $anniversary,
            'present' => $presents,
        ]);
   }
}
