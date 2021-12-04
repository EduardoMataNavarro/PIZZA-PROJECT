<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PizzaTopping extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
        'topping_id',
        'quantity',
    ];

    function Pizza() {
        return $this->belongsTo(Pizza::class);
    }

    function Topping() {
        return $this->belongsTo(Topping::class);
    }
}
