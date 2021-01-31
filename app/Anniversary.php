<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anniversary extends Model
{
    protected $fillable = ['day','anniversary',];
    
    static $anniversaries = [
        '誕生日', '結婚記念日','出産祝い','開店祝い','卒業祝い','入学祝い','クリスマス','バレンタイン','ホワイトデー','その他'
    ];
    
    
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
