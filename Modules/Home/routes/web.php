<?php

use Illuminate\Support\Facades\Route;
use Modules\Home\App\Http\Controllers\HomeController;
use Modules\Home\App\Http\Controllers\ReviewController;
use Modules\Home\App\Http\Controllers\StateController;
use Modules\Home\App\Http\Controllers\SubscribeController;
use Modules\Home\App\Http\Controllers\SliderController;
use Modules\Home\App\Http\Controllers\PackageController;
use Modules\Home\App\Http\Controllers\SearchController;
use Modules\Home\App\Http\Controllers\BookingController;


Route::resource('/', HomeController::class)->names('home');

Route::middleware('auth')->group(function () {
    Route::post('/review/store/{package}', [ReviewController::class, 'store'])->name('review.store');

    Route::resource('slider', SliderController::class)->names('slider');

    // BOOKING ROUTE
    Route::get('/book/create/{id}', [BookingController::class, 'index'])->name('book.create');
    Route::post('/book/store/{id}', [BookingController::class, 'store'])->name('book.store');

    Route::get('/book/package/{id}', [BookingController::class, 'bookPackage'])->name('book.package');

    Route::resource('state', StateController::class);
});

Route::resource('search', SearchController::class);

Route::get('/packages', [PackageController::class, 'index'])->name('package');
Route::get('/tour/detail/{id}', [PackageController::class, 'detail'])->name('tour.detail');
Route::get('/package/search/{packages?}', [SearchController::class, 'index'])->name('footer.search.index');

Route::resource('subscribe', SubscribeController::class);

// AFTER SLIDER SEARCH AND FOOTER SEARCH ROUTE
Route::post('/header/search', [SearchController::class, 'search'])->name('header.search');
Route::post('/footer/search', [SearchController::class, 'footerSearch'])->name('footer.search');