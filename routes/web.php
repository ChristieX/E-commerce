<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productImageController;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return redirect()->route('category.index');
});


Route::get('/send-email', [EmailsController::class, 'sendEmail']);

Route::resource('products', ProductController::class);
Route::resource('category', CategoryController::class);
Route::delete('product-images/{image}', [ProductImageController::class, 'destroy'])->name('product-images.destroy');
Route::patch('product-images/{image}/set-default', [ProductImageController::class, 'setDefault'])->name('product-images.setDefault');

Route::group(['middleware' => 'auth'], function () {
    });

// admin
Route::prefix('admin')->group(function(){
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard',[AdminController::class,'showdashboard'])->name('admin.dashboard');
        Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');
    });
    Route::get('/login',[AdminController::class,'showlogin'])->name('admin.login');
    Route::post('/login',[AdminController::class,'login'])->name('admin.login');
    Route::get('/forgot_password',[AdminController::class,'show_forgot_password'])->name('admin.forgot_password');
});

// users
Route::prefix('account')->group(function(){
    // guest middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthenticationController::class, 'showlogin'])->name('account.login');
        Route::post('/login', [AuthenticationController::class, 'login'])->name('account.login');
        Route::get('/register', [AuthenticationController::class, 'showregister'])->name('account.register');
        Route::post('/register', [AuthenticationController::class, 'register'])->name('account.register');
    });
    // auth middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [AuthenticationController::class, 'dashboard'])->name('account.dashboard');
        Route::post('/logout', [AuthenticationController::class, 'logout'])->name('account.logout');
    });
});