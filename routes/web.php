<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminStatusController;
use App\Http\Controllers\AdminEmployeeStatusController;
use App\Http\Controllers\AdminManagerialPositionController;

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
        // employee_status
        Route::get('/employee-status',[AdminEmployeeStatusController::class, 'index'])->name('admin.employee-status');
        // $managerial_positions
        Route::get('/managerial-position', [AdminManagerialPositionController::class, 'index'])->name('admin.managerial-position');
    });

});


/*
|------------------------------s--------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| 利用者が利用するルーティングです。
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');
