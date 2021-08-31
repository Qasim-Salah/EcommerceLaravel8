<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
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
    Route::post('/product-search', [HomeController::class, 'search'])->name('product.search');

    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::post('/cart', [ShopController::class, 'store'])->name('cart');
    Route::post('/qty/{id}', [ShopController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::post('/qty/{id}', [ShopController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::post('/qty/remove/{id}', [ShopController::class, 'destroy'])->name('destroyQuantity');
    Route::get('/destroy', [ShopController::class, 'destroyAll'])->name('destroyAllQuantity');

    Route::get('/product-category/{slug}', [ShopController::class, 'productCategory'])->name('category.product');


    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/details/{slug}', [ShopController::class, 'details'])->name('details');

});
