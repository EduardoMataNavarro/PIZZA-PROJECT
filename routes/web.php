<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pizza', [App\Http\Controllers\PizzaController::class, 'index'])->name('my_pizzas');
Route::get('/pizza/create', [App\Http\Controllers\PizzaController::class, 'create'])->name('create_pizza');
Route::get('/pizza/{id}', [App\Http\Controllers\PizzaController::class, 'show']);
Route::post('/pizza', [App\Http\Controllers\PizzaController::class, 'store']);

Route::get('/topping', [App\Http\Controllers\ToppingController::class, 'index']);
Route::get('/topping/create', [App\Http\Controllers\ToppingController::class, 'create']);
Route::get('/topping/{id}', [App\Http\Controllers\ToppingController::class, 'show']);
Route::post('/topping', [App\Http\Controllers\ToppingController::class, 'store']);
Route::post('/topping/{id}', [App\Http\Controllers\ToppingController::class, 'update']);
Route::delete('/topping/{id}', [App\Http\Controllers\ToppingController::class, 'delete']);

Route::post('/pizza-topping', [App\Http\Controllers\PizzaToppingController::class, 'store']);
Route::get('/pizza-topping/{pizza_id}', [App\Http\Controllers\PizzaToppingController::class, 'show']);

Route::get('/logout', App\Http\Controllers\LogoutController::class);

