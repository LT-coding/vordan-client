<?php

use App\Http\Controllers\Account\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/addresses', [ProfileController::class, 'editAddresses'])->name('addresses.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::patch('/addresses', [ProfileController::class, 'saveAddress'])->name('addresses.save');
Route::put('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
