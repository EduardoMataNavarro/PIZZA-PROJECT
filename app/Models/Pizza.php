<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    function User() {
        return $this->belongsTo(User::class);
    }

    function toppings() {
        return $this->belongsToMany('App\Models\Topping', 'pizza_toppings');
    }
}
