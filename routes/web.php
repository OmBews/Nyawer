<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'login_store'])->middleware('guest');
Route::get('/register', [AuthController::class,'register'])->middleware('guest');
Route::post('/register', [AuthController::class,'register_store'])->middleware('guest');
Route::post('/logout', [AuthController::class,'logout'])->middleware('auth');


Route::get('/donations/create', [DonationController::class,'donation_create'])->middleware('auth');
Route::post('/donations/create', [DonationController::class,'donation_create_action'])->middleware('auth');
Route::get('/donations/detail/{id}', [DonationController::class,'donation_detail']);

Route::post('/payments/{donation_id}', [PaymentController::class, 'create'])->middleware('auth');
Route::get('/history-payments', [PaymentController::class,'historys']);
