<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 管理者が利用するルーティングです。
*/
Route::prefix('admin')->group(function() {
    Route::get('/signup', [AdminController::class, 'signup'])->name('admin.signup');
    Route::post('/signup', [AdminController::class, 'create'])->name('admin.create');
});

Route::group(['middleware' => ['admin']], function () {

    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
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
