<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giving_user extends Model
{
    protected $fillable = ['name','relation','gender','old'
    ];
    
    static $relation = [
        '父', '母','兄','弟','姉','妹','祖父','祖母','友人','恋人','上司','部下','同僚','得意先'
    ];
    
    static $genders = [
        '男', '女','その他'
    ];
    
    static $old = [
        '不明','10歳以下','10代','20代','30代','40代','50代','60代','70代','80代','90歳以上'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function anniversaries()
    {
        return $this->hasMany(Anniversary::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('anniversaries');
    }
}
