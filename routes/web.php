<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/signup', [AdminController::class, 'signup'])->name('admin.signup');
    Route::post('/signup', [AdminController::class, 'create'])->name('admin.create');
});


Route::get('/', function () {
    return view('welcome');
});
