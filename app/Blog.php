<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Blog extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }
}
