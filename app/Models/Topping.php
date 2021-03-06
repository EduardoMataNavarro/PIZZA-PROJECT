<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'quantity',
        'price',
    ];

    function pizzas() {
        return $this->belongsToMany('App\Models\Pizza', 'pizza_toppings');
    }
}
