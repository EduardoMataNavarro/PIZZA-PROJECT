<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Topping;
use App\Models\Pizza;

class PizzaController extends Controller
{
    //
    function index() {

        $pizzas = Pizza::where('user_id', Auth::id())->get();
        
        return view('pages.pizzas', [ 'pizzas' => $pizzas ]);
    }

    function create() {
        $toppings = Topping::all();

        // return $toppings;
        return view('pages.pizza', [ 'toppings' => $toppings ]);
    }

    function store(Request $request) {
        $user_id = Auth::id();
        $name = $request->input('name');
        
        $name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $name);

        $newPizza = Pizza::create([
            'user_id' => $user_id,
            'name' => $name,
        ]);
        $newPizza->save();

        return response()->json($newPizza);
    }

    function show($id) {

        $pizza = Pizza::find($id);
        $toppings = $pizza->toppings;   
        return view('pages.pizza', [
            'pizza' => $pizza,
            'toppings' => $toppings,
        ]);
    }
}
