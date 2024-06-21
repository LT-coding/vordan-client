<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => ['verified']], function () {
    foreach (File::files(__DIR__ . '/account') as $file) {
        require $file;
    }
});

require __DIR__ . '/auth.php';
