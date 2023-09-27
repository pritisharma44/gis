<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ServiceEngineerController;

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


Route::get('/form', function () {
    return view('form');
});
Route::get('/table', function () {
    return view('table');
});

Route::get('admin',[LoginController::class,'loginPage'])->name('admin.login');
Route::post('admin/login',[LoginController::class,'login'])->name('login');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
 
    Route::get('dashboard',[LoginController::class,'dashboard'])->name('admin.dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::resource('service-engineers', ServiceEngineerController::class);
    Route::post('change-engineer-status/{id}',[ServiceEngineerController::class,'changeStatus'])->name('changeStatus');

});