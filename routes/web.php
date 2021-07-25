<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    // Registration routes
    Route::get('/register', [UserController::class, 'view_register'])->name('users.register');
    Route::post('/register/save', [UserController::class, 'save'])->name('users.save');
    
    // Authentication routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('signin');
    
    // Password reset route
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Users route
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'view_edit'])->name('users.edit');
    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');

    // Image routes
    Route::get('/image', [ImageController::class, 'index'])->name('image.index');
    Route::get('/image/create', [ImageController::class, 'view_create'])->name('image.create');
    Route::post('/image/save', [ImageController::class, 'save'])->name('image.save');
    Route::get('/image/edit/{id}', [ImageController::class, 'view_edit'])->name('image.edit');
    Route::post('/image/update', [ImageController::class, 'update'])->name('image.update');

    // Gallery routes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
});
