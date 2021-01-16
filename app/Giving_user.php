<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giving_user extends Model
{
    protected $fillable = ['name','relation','gender','old'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function anniversaries()
    {
        return $this->hasMany(anniversary::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('anniversaries');
    }
}
