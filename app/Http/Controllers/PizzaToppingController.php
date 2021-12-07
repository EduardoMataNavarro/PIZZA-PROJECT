<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaToppingController extends Controller
{
    //
    function store(Request $request) {

        $pizza_id   = $request->input('pizza_id');
        $topping_id = $request->input('topping_id');

        $pizza = Pizza::find($pizza_id);
        if ($pizza->toppings->contains($topping_id)) {
            $pizza->toppings()->detach($topping_id);
        } else {
            $pizza->toppings()->attach($topping_id);
        }
        $pizza->save();
        $toppings = Pizza::find($pizza_id)->toppings;    

        return response()->json($toppings);
    }

    function update($id, Request $request) {
        $pizza_topping = PizzaTopping::find($id);

        if ($pizza_topping) {
            $quantity = $request->input('quantity');
            $pizza_topping->quantity = $quantity;
            $pizza_topping->save();
    
            return response()->json($pizza_topping);   
        } else {
            return response()->json(['error' => 'Pizza topping not found']);
        }
    }

    function show($pizza_id) {
        $pizza = Pizza::find($pizza_id);
        if ($pizza) {
            return response()->json($pizza->toppings);
        } else {
            return response()->json(['error' => 'Pizza wasn\'t found']);
        }
    }
    
    function delete($id) {
        $pizza_topping = PizzaTopping::find($id);
        if ($pizza_topping) {
           return response()->json($pizza_topping->delete()); 
        } else {
            return response()->json(['error' => 'Pizza topping not found']);
        }
    }
}
