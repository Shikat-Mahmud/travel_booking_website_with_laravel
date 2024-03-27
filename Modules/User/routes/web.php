<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\UserController;

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

Route::group([], function () {
    Route::resource('user', UserController::class)->names('user');

    // Update Password
    Route::get('/change_password', [UserController::class, 'changePass'])->name('change.password');
    Route::post('/update_password', [UserController::class, 'updatePass'])->name('update.password');
    Route::get('/booking-details', [UserController::class, 'booking'])->name('user.booking');
});
