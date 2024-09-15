<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntityController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

    Route::post('/entities', [EntityController::class, 'index'])->name('entities.store');
    Route::get('/entities/{id}', [EntityController::class, 'show']);

    Route::resource('admins', AdminController::class); // Admin Crud
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

});

