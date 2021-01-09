<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Present;

class PresentsController extends Controller
{
    public function create($id)
    {

        $anniversary = \App\Anniversary::findOrFail($id);
        
        $present = new Present;
        
        return view('presents.create',[
            'anniversary'=> $anniversary,
            'present' => $present,
            ]);
    }
    
    public function store(Request $request,$id)
    {
        if (\Auth::check()) {
            
            \Auth::user();
                
            $request->validate([
                'present' => 'required|max:255',
                'year' => 'required|max:255',
            ]);
            
            $present = new Present;
            $present->anniversary_id = $id;
            $present->present = $request->present;
            $present->year = $request->year;
            $present->save();
                
            return redirect('/');
        }
    }
    
    public function destroy($id)
    {
        $present = \App\Present::findOrFail($id);
        
        $anniversary_id = $present->anniversary_id;
        
        $anniversary =  \App\Anniversary::findOrFail($anniversary_id);
        
        if(\Auth::user()->id === $anniversary->user_id) {
            $present->delete();
        }
        
        return back();
    }
}
