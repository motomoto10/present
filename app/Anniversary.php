<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anniversary extends Model
{
    protected $fillable = ['day','anniversary',];
    
    
    public function giving_user()
    {
        return $this->belongsTo(Giving_user::class);
    }
    
    public function presents()
    {
        return $this->hasMany(Present::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('presents');
    }
    
    protected $dates = ['day'];
}
