<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anniversary extends Model
{
    protected $fillable = ['day','anniversary',];
    
    public function anniversary()
    {
        return $this->belongsTo(Giving_user::class);
    }
}
