<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index']);

Auth::routes();
Route::group(['prefix' => 'front', 'as' => 'front.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/details/{slug}', [ProductController::class, 'details'])->name('details');

});
