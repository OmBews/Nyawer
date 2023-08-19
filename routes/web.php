<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'login_store'])->middleware('guest');
Route::get('/register', [AuthController::class,'register'])->middleware('guest');
Route::post('/register', [AuthController::class,'register_store'])->middleware('guest');
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::get('/donations/create', [DonationController::class,'donation_create'])->middleware('auth');
Route::post('/donations/create', [DonationController::class,'donation_create_action'])->middleware('auth');
