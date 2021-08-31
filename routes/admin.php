<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'guest:admin'], function () {

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('post.login');

});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{slug}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{slug}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{slug}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{slug}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', [HomeSliderController::class, 'index'])->name('slider');
        Route::get('/create', [HomeSliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [HomeSliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [HomeSliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [HomeSliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [HomeSliderController::class, 'destroy'])->name('slider.destroy');
    });

    Route::group(['prefix' => 'sale'], function () {
        Route::get('/create', [SaleController::class, 'create'])->name('sale.create');
        Route::post('/store', [SaleController::class, 'store'])->name('sale.store');
    });

});

Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
