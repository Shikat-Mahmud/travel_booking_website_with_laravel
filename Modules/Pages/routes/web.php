<?php

use Illuminate\Support\Facades\Route;
use Modules\Pages\App\Http\Controllers\PagesController;



Route::middleware('auth')->group(function () {
    Route::get('pages/index', [PagesController::class, 'indexPages'])->name('index.pages');
    Route::get('pages/create', [PagesController::class, 'createPages'])->name('create.pages');
    Route::post('pages/create', [PagesController::class, 'storePages'])->name('store.pages');
    Route::get('pages/edit/{slug}', [PagesController::class, 'editPages'])->name('edit.pages');
    Route::put('pages/update/{slug}', [PagesController::class, 'updatePages'])->name('update.pages');
    Route::get('pages/show/{slug}', [PagesController::class, 'showPages'])->name('show.pages');
    Route::delete('pages/delete/{slug}', [PagesController::class, 'deletePages'])->name('delete.pages');
});





