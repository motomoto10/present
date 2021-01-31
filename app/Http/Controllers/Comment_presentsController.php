<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use \App\User;

class Comment_presentsController extends Controller
{
    
    public function create($id)
    {
         $present = \App\Present::findOrFail($id);
        
        return view('comments.create',[
            'present' => $present,
            ]);
        
    }
    
    public function store(Request $request,$id)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);
        
        // ここに不具合あり
        
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->name = $request->name;
        $comment->user_id = \Auth::user()->id;
        $comment->present_id =$id;
        $comment->save();
                
            return redirect('/');
    }
    
    public function destroy($id)
    {
        return back();
    }
}
