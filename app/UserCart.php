<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
    public function cart()
    {
        return $this->belongsTo(\App\Cart::class, 'cart_product', 'id');
    }
    public function favourites()
    {
        return $this->belongsTo(\App\Cart::class, 'wishlist', 'id');
    }
}
