<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest:web'])->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::view('/register', 'login')->name('register');
});

Route::middleware(['auth:web'])->group(function () {
    Route::view('{any?}', 'index')
        ->where('any', '^(?!api|login|recovery-password|new-password|save-password).*$');
});
