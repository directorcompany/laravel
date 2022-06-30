<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // form
Route::post('/', [App\Http\Controllers\HomeController::class, 'store'])->name('store'); // post form
Route::get('/manager', [App\Http\Controllers\ApplyController::class, 'index'])->middleware('can:isManager,\App\Models\User')->name('manager'); 
Route::get('/update/{id}', [App\Http\Controllers\ApplyController::class, 'update'])->name('update');
// Route::get('/middle', [App\Http\Controllers\HomeController::class, 'middle'])->name('middle'); view to show error
