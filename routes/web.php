<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('home', HomeController::class);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop']);

Route::get('/show_product/{id}', [App\Http\Controllers\productDetailsController::class, 'show_product']);

Route::post('add_to_cart',[CartController::class, 'add_to_cart'])->name('add_to_cart');

Route::get('show_cart',[CartController::class, 'show_cart']);

// Route::get('delete_from_cart/{id}',[CartController::class, 'delete_from_cart'])->name('delete_from_cart');
Route::get('delete_from_cart',[CartController::class, 'delete_from_cart'])->name('delete_from_cart');

Route::get('get_count',[CartController::class, 'get_count'])->name('get_count');

Route::get('checkout',[CheckoutController::class, 'index']);


Route::post('placeOrder',[CheckoutController::class, 'placeOrder']);

Route::get('send_mail', [CheckoutController::class, 'send_mail']);
