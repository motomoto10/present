<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anniversary;
use App\Present;

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
    
    public function show($id,$anniversary)
    {
        
        $giving_user = \App\Giving_user::findOrFail($id);
        
        $anniversaries = \App\Anniversary::findOrFail($anniversary);
        
        $presents = Present::where('anniversary_id',$anniversary)->get();
        
        return view('anniversaries.show',[
            'giving_user' => $giving_user,
            'anniversary' => $anniversaries,
            'presents' => $presents,
            ]);
    }
    
        
    public function create($id)
    {

        $giving_user = \App\Giving_user::findOrFail($id);
        
        $anniversary = new Anniversary;
        
        return view('anniversaries.create',[
            'anniversary'=> $anniversary,
            'giving_user' => $giving_user,
            ]);
    }
    
    public function store(Request $request,$id)
    {
        if (\Auth::check()) {
            
            \Auth::user();
                
            $request->validate([
                'anniversary' => 'required|max:255',
                'day' => 'required|max:255',
            ]);
            
            $anniversary = new Anniversary;
            $anniversary->anniversary = $request->anniversary;
            $anniversary->day = $request->day;
            $anniversary->user_id = \Auth::user()->id;
            $anniversary->giving_user_id = $id;
            $anniversary->save();
                
            return redirect('/');
        }
    }
    
    
    public function edit($id,$anniversary)
    {

        $giving_user = \App\Giving_user::findOrFail($id);
        
        $anniversary = Anniversary::findOrFail($anniversary);
        
        return view('anniversaries.edit',[
            'anniversary'=> $anniversary,
            'giving_user' => $giving_user,
            ]);
    }
    
    public function update(Request $request,$id,$anniversary)
    {
        if (\Auth::check()) {
            
            \Auth::user();
                
            $request->validate([
                'anniversary' => 'required|max:255',
                'day' => 'required|max:255',
            ]);
            
            $anniversary = Anniversary::findOrFail($anniversary);
            $anniversary->anniversary = $request->anniversary;
            $anniversary->day = $request->day;
            $anniversary->save();
                
            return redirect('/');
        }
    }
    
    public function destroy($id,$anniversary)
    {
        
        $anniversary = \App\Anniversary::findOrFail($anniversary);
        
        if(\Auth::user()->id === $anniversary->user_id) {
            $anniversary->delete();
        }
        
        return redirect('/');
    }
    
}
