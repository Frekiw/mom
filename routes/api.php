<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TncController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MeetingController;
use App\Http\Controllers\API\StmeetingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('update/user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::get('meeting', [MeetingController::class, 'all']);
    Route::post('meeting/tambah', [MeetingController::class, 'meeting']);
    Route::post('stmeeting/tambah', [StmeetingController::class, 'stmeeting']);
});

Route::post('login', [UserController::class, 'login']);
Route::get('stmeeting', [StmeetingController::class, 'all']);
Route::get('tnc', [TncController::class, 'all']);