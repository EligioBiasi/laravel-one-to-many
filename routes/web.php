<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
    Route::get("/",[DashboardController::class, 'home'])->name('home');
    Route::get("/project/deleted", [ProjectController::class, 'deletedIndex'])->name('project.deletedIndex');
    Route::post('/project/deleted/{project}', [ProjectController::class, 'restore'] )->name('project.restore');
    Route::resource("/project", ProjectController::class);
});

Route::middleware('auth')->group(function (){
    Route::get("guest/home",[DashboardController::class, 'home'])->name('guest.home');
});