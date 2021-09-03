<?php

use App\Http\Controllers\User\Auth\ChangePasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\VerificationController;
use App\Http\Controllers\User\CheckOutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('show_register_form');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/product-search', [HomeController::class, 'search'])->name('product.search');

    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::post('/cart', [ShopController::class, 'store'])->name('store.cart');

    Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');
    Route::get('/category', [HomeController::class, 'category'])->name('category');


    Route::post('/wishlist', [ShopController::class, 'addToWishList'])->name('cart.wishlist');
    Route::get('/wishlist/remove/{id}', [ShopController::class, 'destroyWishlist'])->name('destroy.wishlist');


    Route::get('/increase/{rowId}', [ShopController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::get('/decrease/{rowId}', [ShopController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    Route::get('/qty/remove/{rowId}', [ShopController::class, 'destroy'])->name('destroyQuantity');
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
