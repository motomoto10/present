<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','user_id'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function present()
    {
        return $this->belongsTo(Present::class);
    }
}

