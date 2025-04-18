<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;

Route::get('/', function () {
    return view('auth.login');
})->name('landing');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Category
Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('category');
Route::get('/dashboard/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/dashboard/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/dashboard/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

// Participant
Route::get('/dashboard/participant', [ParticipantController::class, 'index'])->name('participant');
Route::get('/dashboard/participant/detail/{id}', [ParticipantController::class, 'detail'])->name('participant.detail');
Route::get('/dashboard/participant/create', [ParticipantController::class, 'create'])->name('participant.create');
Route::post('/dashboard/participant/store', [ParticipantController::class, 'store'])->name('participant.store');
Route::get('/dashboard/participant/edit/{id}', [ParticipantController::class, 'edit'])->name('participant.edit');
Route::post('/dashboard/participant/update/{id}', [ParticipantController::class, 'update'])->name('participant.update');
Route::get('/dashboard/participant/delete/{id}', [ParticipantController::class, 'delete'])->name('participant.delete');
Route::get('/dashboard/participant/attend/undo/{id}', [ParticipantController::class, 'undoAttend'])->name('participant.undoAttend');

// Account
Route::get('/dashboard/account',[UserController::class, 'index'])->name('account');
Route::get('/dashboard/account/create',[UserController::class, 'create'])->name('account.create');
Route::post('/dashboard/account/store',[UserController::class, 'store'])->name('account.store');
Route::get('/dashboard/account/edit/{id}',[UserController::class, 'edit'])->name('account.edit');
Route::post('/dashboard/account/update/{id}',[UserController::class, 'update'])->name('account.update');

// Attendance
Route::get('/dashboard/attendance',[AttendanceController::class, 'index'])->name('attendance');
Route::get('/dashboard/attendance/check',[AttendanceController::class, 'check'])->name('attendance.check');
Route::get('/dashboard/attendance/detail/{id}', [AttendanceController::class, 'detail'])->name('attendance.detail');
Route::get('/dashboard/attendance/attend/{id}', [AttendanceController::class, 'attend'])->name('attendance.attend');

// Log
Route::get('/dashboard/logs',[LogController::class, 'index'])->name('logs');