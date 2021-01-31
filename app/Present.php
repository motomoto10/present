<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    protected $fillable = ['present','year','explain'
    ];
    
    public function favorite()
    {
        return $this->belongsToMany(User::class,'favorite_present','present_id', 'user_id')->withTimestamps();
    }
    public function comment()
    {
        return $this->belongsToMany(User::class,'comments','present_id', 'user_id')->withTimestamps();
    }
    
    public function anniversary()
    {
        return $this->belongsTo(Anniversary::class);
    }
    
    public function favorite_presents()
    {
        // このユーザがお気に入り中のプレゼントのidを取得して配列にする
        $presents = $this->favorite()->pluck('presents.id')->toArray();
        // それらのユーザが所有する投稿に絞り込む
        return Present::whereIn('present_id', $presentIds);
    }
}
