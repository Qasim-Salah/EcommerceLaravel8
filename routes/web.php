<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Auth::routes();
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/product-search', [HomeController::class, 'search'])->name('product.search');

    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::post('/cart', [ShopController::class, 'store'])->name('store.cart');
    Route::post('/wishlist', [ShopController::class, 'addToWishList'])->name('cart.wishlist');


    Route::get('/qty/{rowId}', [ShopController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::get('/qty/{rowId}', [ShopController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::post('/qty/remove/{rowId}', [ShopController::class, 'destroy'])->name('destroyQuantity');
    Route::get('/destroy', [ShopController::class, 'destroyAll'])->name('destroyAllQuantity');

    Route::get('/product-category/{slug}', [ShopController::class, 'productCategory'])->name('category.product');


    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/details/{slug}', [ShopController::class, 'details'])->name('details');

});
