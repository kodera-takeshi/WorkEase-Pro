<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminStatusController;
use App\Http\Controllers\AdminEmployeeStatusController;
use App\Http\Controllers\AdminManagerialPositionController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\AdminListController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 管理者が利用するルーティングです。
*/
Route::group(['middleware' => ['adminAuthentication']], function () {
    Route::prefix('admin')->group(function () {
        // sign up
        Route::get('/signup', [AdminController::class, 'signup'])->name('admin.signup');
        Route::post('/signup', [AdminController::class, 'create'])->name('admin.create');
        // sign in
        Route::get('/signin', [AdminController::class, 'signin'])->name('admin.signin');
        Route::post('/signin', [AdminController::class, 'check'])->name('admin.check');
    });
});

Route::group(['middleware' => ['admin']], function () {
    Route::prefix('admin')->group(function() {
        // home
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        // admin_list
        Route::get('/list', [AdminListController::class, 'index'])->name('admin.list');
        Route::post('/list/update', [AdminListController::class, 'update'])->name('admin.list.update');
        // companies
        Route::get('/company',[AdminCompanyController::class, 'index'])->name('admin.company');
        // status
        Route::get('/status',[AdminStatusController::class, 'index'])->name('admin.status');
        Route::post('/status',[AdminStatusController::class, 'update'])->name('admin.status.update');
        Route::post('/status/create',[AdminStatusController::class, 'create'])->name('admin.status.create');
        Route::post('/status/delete',[AdminStatusController::class, 'delete'])->name('admin.status.delete');
        Route::post('/status/request',[AdminStatusController::class, 'request'])->name('admin.status.request');
        Route::post('/status/update/request',[AdminStatusController::class, 'updateRequest'])->name('admin.status.update-request');
        Route::post('/status/delete/request',[AdminStatusController::class, 'deleteRequest'])->name('admin.status.delete-request');
        // employee_status
        Route::get('/employee-status',[AdminEmployeeStatusController::class, 'index'])->name('admin.employee-status');
        Route::post('/employee-status',[AdminEmployeeStatusController::class, 'update'])->name('admin.employee-status.update');
        Route::post('/employee-status/create',[AdminEmployeeStatusController::class, 'create'])->name('admin.employee-status.create');
        Route::post('/employee-status/delete',[AdminEmployeeStatusController::class, 'delete'])->name('admin.employee-status.delete');
        Route::post('/employee-status/request',[AdminEmployeeStatusController::class, 'request'])->name('admin.employee-status.request');
        Route::post('/employee-status/update/request',[AdminEmployeeStatusController::class, 'updateRequest'])->name('admin.employee-status.update-request');
        Route::post('/employee-status/delete/request',[AdminEmployeeStatusController::class, 'deleteRequest'])->name('admin.employee-status.delete-request');
        // managerial_positions
        Route::get('/managerial-position', [AdminManagerialPositionController::class, 'index'])->name('admin.managerial-position');
        Route::post('/managerial-position', [AdminManagerialPositionController::class, 'update'])->name('admin.managerial-position.update');
        Route::post('/managerial-position/create', [AdminManagerialPositionController::class, 'create'])->name('admin.managerial-position.create');
        Route::post('/managerial-position/delete', [AdminManagerialPositionController::class, 'delete'])->name('admin.managerial-position.delete');
        Route::post('/managerial-position/request', [AdminManagerialPositionController::class, 'request'])->name('admin.managerial-position.request');
        Route::post('/managerial-position/update/request', [AdminManagerialPositionController::class, 'updateRequest'])->name('admin.managerial-position.update-request');
        Route::post('/managerial-position/delete/request', [AdminManagerialPositionController::class, 'deleteRequest'])->name('admin.managerial-position.delete-request');
        // requests
        Route::get('/request', [AdminRequestController::class, 'index'])->name('admin.requests');
        Route::post('/request/approval', [AdminRequestController::class, 'approval'])->name('admin.requests.approval');
        Route::post('/request/denial', [AdminRequestController::class, 'denial'])->name('admin.requests.denial');
        Route::post('/request/cansel', [AdminRequestController::class, 'cansel'])->name('admin.requests.cansel');
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
