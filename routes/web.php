<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;


Route::view('/', 'home')->name('home');

Route::middleware('guest')->group(function()
{
    Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginUserController::class, 'login'])->name('login');
    Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::patch('category/{id}/mark-as-done', [CategoryController::class, 'markAsDone'])->name('category.mark-as-done');
    Route::resource('category', CategoryController::class);
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
});


