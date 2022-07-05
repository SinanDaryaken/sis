<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth:web')->group(function () {
    Route::get('auth', [LoginController::class, 'auth']);
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('students/get-by-guardian/{guardian}', [StudentController::class, 'getByGuardian']);
    Route::apiResource('guardian', GuardianController::class)->only('show', 'update');

});
