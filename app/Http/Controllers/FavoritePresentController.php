<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritePresentController extends Controller
{
    public function store($present_id)
    {
        \Auth::user()->favorite($present_id);
        
        return back();
    }
    
    public function destroy($present_id)
    {
        \Auth::user()->unfavorite($present_id);
        
        return back();
    }
}
