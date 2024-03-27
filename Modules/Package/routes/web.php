<?php

use Illuminate\Support\Facades\Route;
use Modules\Package\App\Http\Controllers\PackageController;
use Modules\Package\App\Http\Controllers\FeatureController;



Route::middleware('auth')->group(function () {
    Route::resource('package', PackageController::class)->names('package');

    Route::resource('feature', FeatureController::class)->names('feature');
    Route::get('/feature/delete/{id}', [FeatureController::class, 'destroy'])->name('feature.delete');
});
