<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\App\Http\Controllers\BlogController;
use Modules\Blog\App\Http\Controllers\CommentController;



Route::middleware('auth')->group(function () {
Route::resource('blog', BlogController::class)->names('blog');

Route::post('/comments-store', [BlogController::class, 'storeComment'])->name('comments.store');
Route::get('/comments-index',[BlogController::class,'indexComment'])->name('comments.index');
// Route::get('/comments/{id}/edit', [BlogController::class, 'editComment'])->name('comments.edit');
Route::put('/comments/{id}', [BlogController::class, 'updateComment'])->name('comments.update');


});

Route::get('/blog-main', [BlogController::class, 'blog'])->name('blog.main');
Route::get('/blog-details/{id}', [BlogController::class, 'blogdetails'])->name('blog.details');