<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\JobManagementController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[JobController::class, 'index']);

//Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

//Login
Route::get('/login',[SessionController::class, 'create'])->name('login.create');
Route::post('/login',[SessionController::class, 'store'])->name('login.store');
Route::delete('/logout',[SessionController::class,'destroy'])->name('logout')->middleware('auth');

//User Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/user',[UserController::class, 'index'])->name('user.index');
});

//User Dashboard - Job Management
Route::get('/joblist',[JobManagementController::class, 'index'])->name('user.joblist');
Route::get('/job-application',[JobManagementController::class, 'jobApplication'])->name('user.job-application');
Route::post('/save-job/{id}', [JobManagementController::class, 'save'])->name('jobs.save');
Route::get('/saved-jobs',[JobManagementController::class, 'savedJobs'])->name('user.saved-jobs');
