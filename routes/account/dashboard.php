<?php

use App\Http\Controllers\Account\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/referral-program', [DashboardController::class, 'referral'])->name('referral');
