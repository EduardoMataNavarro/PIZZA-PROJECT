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

    function Pizzas() {
        return $this->belongsToMany(Pizza::class)->using(PizzaTopping::class);
    }
}
