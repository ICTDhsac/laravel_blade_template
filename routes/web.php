<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/', 'posts.index')->name('home');

Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/user/{id}', [UserController::class, 'show']);



// Route::resources([
//     'user' => UserController::class
// ]);

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
