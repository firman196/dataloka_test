<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PelangganController;
use App\Http\Controllers\Backend\DatatableController;

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

Route::get('/', function () {
    return view('auth.login');
});

//routes group pelanggan
Route::prefix('pelanggan')->group(function () {
    Route::get('/',[PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/create', [PelangganController::class,'create'])->name('pelanggan.create');
    Route::get('/show', [PelangganController::class,'show'])->name('pelanggan.show');
});

Auth::routes();

