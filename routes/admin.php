<?php

use App\Http\Controllers\Dashboard\LoginController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>'guest:admin'], function () {

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('post.login');

});
Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');
