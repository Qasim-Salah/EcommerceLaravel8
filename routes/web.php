<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\User\CheckOutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
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
    Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');

    Route::post('/cart', [ShopController::class, 'store'])->name('store.cart');
    Route::post('/wishlist', [ShopController::class, 'addToWishList'])->name('cart.wishlist');
    Route::get('/wishlist/remove/{id}', [ShopController::class, 'destroyWishlist'])->name('destroy.wishlist');


    Route::get('/qty/{rowId}', [ShopController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::get('/qty/{rowId}', [ShopController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::post('/qty/remove/{rowId}', [ShopController::class, 'destroy'])->name('destroyQuantity');
    Route::get('/destroy', [ShopController::class, 'destroyAll'])->name('destroyAllQuantity');

    Route::get('/product-category/{slug}', [ShopController::class, 'productCategory'])->name('category.product');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/checkout', [CheckOutController::class, 'create'])->name('checkout.create');
        Route::post('/checkout', [CheckOutController::class, 'store'])->name('checkout.store');
        Route::get('/thank', [CheckOutController::class, 'thank'])->name('checkout.thank');

        Route::group(['prefix' => 'order'], function () {

            Route::get('/', [OrderController::class, 'index'])->name('order');
            Route::get('/details/{id}', [OrderController::class, 'details'])->name('order.details');

        });
        Route::get('/change-password', [ChangePasswordController::class, 'create'])->name('change.password');
        Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password.store');

    });
    Route::get('/details/{slug}', [ShopController::class, 'details'])->name('details');

});
