<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobManagementController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/job-view', [JobController::class, 'show'])->name('jobs.view');

//Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

//Login
Route::get('/login', [SessionController::class, 'create'])->name('login.create');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

//User Dashboard
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    //User Dashboard - Job Management
    Route::get('/joblist', [JobManagementController::class, 'index'])->name('user.joblist');
    Route::get('/applied-jobs', [JobManagementController::class, 'appliedJobs'])->name('user.applied-jobs');
    Route::post('/save-job/{id}', [JobManagementController::class, 'save'])->name('jobs.save');
    Route::delete('/unsave-job/{id}', [JobManagementController::class, 'unsave'])->name('jobs.unsave');
    Route::get('/saved-jobs', [JobManagementController::class, 'savedJobs'])->name('user.saved-jobs');
    Route::get('/jobs/{job}/apply-job', [JobManagementController::class, 'applyJob'])->name('user.apply-job');
    Route::post('/jobs/{job}/store', [JobManagementController::class, 'storeJob'])->name('user.store-job');
    Route::delete('/applications/{application}', [JobManagementController::class, 'destroy'])->name('applications.destroy');

    //Personal Info
    Route::get('/personal-info', [PersonalInfoController::class, 'index'])->name('user.personal-info');
    Route::get('/create-personal-info', [PersonalInfoController::class, 'create'])->name('user.create-personal-info');
    Route::get('/show-personal-info', [PersonalInfoController::class, 'show'])->name('user.show-personal-info');
    Route::post('/store-personal-info', [PersonalInfoController::class, 'store'])->name('user.store-personal-info');
    Route::put('/update-personal-info/{id}', [PersonalInfoController::class, 'update'])->name('user.update-personal-info');

    //Skills
    Route::get('/skills', [SkillController::class, 'index'])->name('user.skill-index');
    Route::post('/skills-add', [SkillController::class, 'store'])->name('user-skill.store');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('user-skill.delete');

    //Experience
    Route::get('/exp',[ExperienceController::class,'index'])->name('user.experience');
    Route::get('/exp-create',[ExperienceController::class,'create'])->name('user.create-experience');
    Route::post('/exp-store',[ExperienceController::class,'store'])->name('user.store-experience');
    
});

