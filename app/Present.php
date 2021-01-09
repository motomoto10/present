<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    protected $fillable = ['present','year',];
    
    public function present()
    {
        return $this->belongsTo(anniversary::class);
    }
}
