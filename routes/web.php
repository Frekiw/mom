<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TncController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\StmeetingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//Homepage
Route::get('/', function (){
    return redirect()->route('dashboard');
});

// Dashboard
Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('meetings', MeetingController::class);
        Route::resource('stmeetings', StmeetingController::class);
        Route::resource('users', UserController::class);
        Route::resource('tncs', TncController::class);
    });

// Route::resource('signs', SignController::class);
// Route::put('/signs/{sign}', [SignController::class, 'update'])->name('signs.update');

Route::get('sign/portal', [SignController::class, 'showPortal'])->name('showPortal');
Route::post('sign/portal', [SignController::class, 'portal'])->name('portal');

Route::get('sign/ubah/{id_meeting}', [SignController::class, 'ubahsign'])->name('ubahsign')->middleware('check.meeting.auth');
Route::post('sign/update', [SignController::class, 'updatesign'])->name('updatesign');
