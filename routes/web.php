<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminStatusController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 管理者が利用するルーティングです。
*/

Route::group(['middleware' => ['adminAuthentication']], function () {

    Route::prefix('admin')->group(function () {
        Route::get('/signup', [AdminController::class, 'signup'])->name('admin.signup');
        Route::post('/signup', [AdminController::class, 'create'])->name('admin.create');

        Route::get('/signin', [AdminController::class, 'signin'])->name('admin.signin');
        Route::post('/signin', [AdminController::class, 'check'])->name('admin.check');
    });
});

Route::group(['middleware' => ['admin']], function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        // companies
        Route::get('/company',[AdminCompanyController::class, 'index'])->name('admin.company');
        // status
        Route::get('/status',[AdminStatusController::class, 'index'])->name('admin.status');
    });

});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| 利用者が利用するルーティングです。
*/
Route::get('/', function () {
    return view('welcome');
});
