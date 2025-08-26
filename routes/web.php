<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::get('/send-email', [EmailsController::class, 'sendEmail']);

// users

// admin
Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'showlogin'])->name('admin.login');
    Route::post('/login',[AdminController::class,'login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class,'showdashboard'])->name('admin.dashboard');
});