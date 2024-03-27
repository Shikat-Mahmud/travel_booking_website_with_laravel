<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StripePaymentController;

Route::get('webpage/{slug}', [FrontendController::class, 'pages'])->name('pages.fornt');
Route::get('location', [FrontendController::class, 'location'])->name('location.fornt');
Route::get('destinations/{id}', [FrontendController::class, 'destination'])->name('destination.fornt');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact.fornt');
Route::post('contact', [FrontendController::class, 'contactSend'])->name('contact.send');


Route::get('/admin', function (){
    return 'admin found';
});



Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::middleware(['auth', 'permission:admin-panel'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users-create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users-store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users-details/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/roles/{user}', [UserController::class, 'role'])->name('users.roles.edit');
    Route::post('/users/roles/{user}', [UserController::class, 'giveRole'])->name('users.roles');
    Route::resource('categories', CategoryController::class);
});

Route::get('/admin-login', [IndexController::class, 'login'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/stripe-payment', [StripePaymentController::class, 'stripePost'])->name('stripe.payment');
});

require __DIR__ . '/auth.php';

// all settings route
Route::get('/general-setting', [SettingsController::class, 'index'])->name('general.setting');
Route::post('/setting-update', [SettingsController::class, 'update'])->name('setting.update');

Route::get('/email-setting', [SettingsController::class, 'emailSetting'])->name('email.setting');
Route::post('/email-update', [SettingsController::class, 'emailUpdate'])->name('email.update');
Route::get('application-cache-clear', [SettingsController::class, 'cacheClear'])->name('application.cache.clear');

Route::resource('products', ProductController::class);

