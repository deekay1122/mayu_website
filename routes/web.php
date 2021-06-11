<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OnlineSalonController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/shop', [ShopController::class, 'showShop']);
Route::get('/shop/add_to_cart/{id}', [ShopController::class, 'addToCart']);
Route::get('/shop/remove_from_checkout/{id}', [ShopController::class, 'removeFromCheckout']);
Route::get('/shop/remove_from_cart/{id}', [ShopController::class, 'removeFromCart']);
Route::get('/shop/cart', [ShopController::class, 'showCart']);
Route::get('/shop/checkout', [ShopController::class, 'showCheckout'])->middleware('auth');
Route::get('/store_order', [ShopController::class, 'storeOrder'])->middleware('auth');

Route::get('/online_salon', [OnlineSalonController::class, 'showOnlineSalon']);
Route::get('/online_salon/createProduct', [OnlineSalonController::class, 'createProduct']);
Route::post('online_salon/webhook', [OnlineSalonController::class, 'paypalSubscriptionListener']);