<?php

use Illuminate\Support\Facades\Route;
use Modules\Destination\App\Http\Controllers\DestinationController;


Route::middleware('auth')->group(function () {
    Route::get('destination/index', [DestinationController::class, 'indexDestination'])->name('index.destination');
    Route::get('destination/create', [DestinationController::class, 'createDestination'])->name('create.destination');
    Route::post('destination/create', [DestinationController::class, 'storeDestination'])->name('store.destination');
    Route::get('destination/edit/{id}', [DestinationController::class, 'editDestination'])->name('edit.destination');
    Route::put('destination/update/{id}', [DestinationController::class, 'updateDestination'])->name('update.destination');
    Route::get('destination/show/{id}', [DestinationController::class, 'showDestination'])->name('show.destination');
    Route::delete('destination/delete/{id}', [DestinationController::class, 'deleteDestination'])->name('delete.destination');
});
