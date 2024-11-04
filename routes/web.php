<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;


Route::view('/', 'home')->name('home');

Route::middleware('guest')->group(function () {

    Route::view('/register', 'auTh.signUp')->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    
    Route::view('/login', 'auTh.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::patch('category/{id}/mark-as-done', [CategoryController::class, 'markAsDone'])->name('category.mark-as-done');
    Route::resource('category', CategoryController::class);
    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


