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
        Route::post('/status',[AdminStatusController::class, 'update'])->name('admin.status.update');
        Route::post('/status/delete',[AdminStatusController::class, 'delete'])->name('admin.status.delete');
        // employee_status
        Route::get('/employee-status',[AdminEmployeeStatusController::class, 'index'])->name('admin.employee-status');
        Route::post('/employee-status',[AdminEmployeeStatusController::class, 'update'])->name('admin.employee-status.update');
        Route::post('/employee-status/delete',[AdminEmployeeStatusController::class, 'delete'])->name('admin.employee-status.delete');
        // managerial_positions
        Route::get('/managerial-position', [AdminManagerialPositionController::class, 'index'])->name('admin.managerial-position');
        Route::post('/managerial-position', [AdminManagerialPositionController::class, 'update'])->name('admin.managerial-position.update');
        Route::post('/managerial-position/delete', [AdminManagerialPositionController::class, 'delete'])->name('admin.managerial-position.delete');
        // profile
        Route::get('/profile', [AdminController::class, 'edit'])->name('admin.profile');
        Route::post('/profile', [AdminController::class, 'update'])->name('admin.profile.update');
        // sign out
        Route::post('/signout', [AdminController::class, 'signout'])->name('admin.signout');
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
