<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giving_user extends Model
{
    protected $fillable = ['name','relation',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
