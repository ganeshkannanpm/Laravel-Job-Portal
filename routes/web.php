<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/',[JobController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login',[SessionController::class, 'create'])->name('login.create');
Route::post('/login',[SessionController::class, 'store'])->name('login.store');
Route::delete('/logout',[SessionController::class,'destroy'])->name('logout');