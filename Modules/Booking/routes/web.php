<?php

use Illuminate\Support\Facades\Route;
use Modules\Booking\App\Http\Controllers\BookingController;



Route::middleware('auth')->group(function () {
    Route::resource('booking', BookingController::class)->names('booking');
    Route::put('/booking-update-status/{id}', [BookingController::class,'updateStatus'])->name('booking.update.status');
});
