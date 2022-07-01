<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplyController;

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

Route::get('/', [HomeController::class, 'index'])->name('home'); // form
Route::post('/', [HomeController::class, 'store'])->name('store'); // post form
Route::get('/manager', [ApplyController::class, 'index'])->middleware('can:isManager,\App\Models\User')->name('manager'); 
Route::get('/update/{id}', [ApplyController::class, 'update'])->name('update');
// Route::get('/middle', [HomeController::class, 'middle'])->name('middle'); view to show error
