<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Topping;

class ToppingController extends Controller
{
    //
    function index() {
        return response()->json(Topping::all());
    }

    function create() {
        if (Auth::user()->role_id == 1) {
            return view('pages.toppings');
        } else {
            return redirect('/pizza');
        }
    }

    function show($id) {
        return response()->json(Topping::find($id));
    }

    function store(Request $request) {
        $name       = $request->input('name');
        $quantity   = $request->input('quantity');
        $price      = $request->input('price');
        
        $file_path = '';
        if ($request->hasFile('image')) {
            $file   = $request->file('image');
            $file_name = $file->store('toppings', 's3');
            $file_path = env('AWS_URL') . '/' . $file_name;
        }
        
        $newTopping = Topping::create([
            'name'      => $name,
            'quantity'  => $quantity,
            'price'     => $price,
            'image'     => $file_path,
        ]);
        $newTopping->save();
        
        return response()->json($newTopping);
    }

    function update(Request $request, $id) {

        $name       = $request->input('name');
        $quantity   = $request->input('quantity');
        $price      = $request->input('price');
        
        $topping = Topping::find($id);
        if ($topping) {

            $topping->name = $name;
            $topping->quantity = $quantity;
            $topping->price = $price;

            if ($request->hasFile('image')) {
                $file   = $request->file('image');
                $file_name = $file->store('toppings', 's3');
                $file_path = env('AWS_URL') . '/' . $file_name;

                $topping->image = $file_path;
            }
            $topping->save();

            return response()->json($topping);
        } else {
            return response()->json(['error' => 'No records were found']);
        }
    }

    function delete($id) {
        $topping = Topping::find($id);
        if ($topping) {
            return response()->json($topping->delete());
        } else {
            return response()->json(['error' => 'No records were found']);
        }
    }
}
