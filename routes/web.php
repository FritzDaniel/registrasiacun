<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/check',[LandingController::class, 'check'])->name('check_participant');
Route::get('/participant/detail/{id}', [LandingController::class, 'detail'])->name('participant_check_detail');
Route::get('/absence/{id}', [LandingController::class, 'attend'])->name('participant_absence');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/participant', [ParticipantController::class, 'index'])->name('participant');
Route::get('/participant/create', [ParticipantController::class, 'create'])->name('participant_create');
Route::post('/participant/store', [ParticipantController::class, 'store'])->name('participant_store');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category_create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category_store');