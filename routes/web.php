<?php

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\UserController;
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


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('landing-page');
    });
    Route::resource('user', UserController::class);
    Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
    Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', UserDashboardController::class)->name('dashboard');
    Route::prefix('user')->name('user.')->group(function () {
    });
});


require __DIR__ . '/auth.php';
