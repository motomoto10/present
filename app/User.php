<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','born','gender','myself'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    static $genders = [
        '男', '女','その他'
    ];
    
    
    public function giving_users()
    {
        return $this->hasMany(Giving_user::class);
    }
    
    public function anniversaries()
    {
        return $this->hasManyThrough('App\Anniversary','App\Giving_user','user_id','giving_user_id','id','id');
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('giving_users','favorites','comments','favorite_users');
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Present::class,'favorite_present', 'user_id','present_id')->withTimestamps();
    }
    
    public function favorite($presentId)
    {
        // すでにいいねしているかの確認
        $exist = $this->is_favorites($presentId);
        
        if($exist) {
            return false;
        }else {
            $this->favorites()->attach($presentId);
            return true;
        }
    }
    
    public function unfavorite($presentId)
    {
        // すでにいいねしているかの確認
        $exist = $this->is_favorites($presentId);
        
        if($exist) {
            $this->favorites()->detach($presentId);
            return true;
        }else {
            return false;
        }
    }
    
    public function is_favorites($presentId)
    {
        // お気に入り中presenttの中に $presentIdのものが存在するか
        return $this->favorites()->where('present_id', $presentId)->exists();
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(Present::class,'favorite_present', 'user_id','present_id')->withTimestamps();
    }
    
    public function favorite_presents()
    {
        // このユーザがお気に入り中のプレゼントのidを取得して配列にする
        $presents = $this->favorite()->pluck('presents.id')->toArray();
        // それらのユーザが所有する投稿に絞り込む
        return Present::whereIn('present_id', $presentIds);
    }
    
    public function comments()
    {
        return $this->belongsToMany(Present::class,'comments', 'user_id','present_id')->withTimestamps();
    }
    
}
