<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\App\Http\Controllers\ContactController;

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

Route::middleware('auth')->group(function () {
    Route::get('contact/index', [ContactController::class, 'indexContact'])->name('index.contact');
    Route::get('contact/create', [ContactController::class, 'createContact'])->name('create.contact');
    Route::post('contact/create', [ContactController::class, 'storeContact'])->name('store.contact');
    Route::get('contact/edit/{id}', [ContactController::class, 'editContact'])->name('edit.contact');
    Route::put('contact/update/{id}', [ContactController::class, 'updateContact'])->name('update.contact');
    Route::delete('contact/delete/{id}', [ContactController::class, 'deleteContact'])->name('delete.contact');
});
