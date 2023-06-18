<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PelangganController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('pelanggan')->group(function(){
    Route::get('/',[PelangganController::class, 'getListPelanggan'])->name('api.pelanggan.index');
    Route::delete('/',[PelangganController::class, 'delete'])->name('api.pelanggan.delete');
    Route::get('/export',[PelangganController::class, 'exportPelanggan'])->name('api.pelanggan.export');
    Route::put('/status/{id}',[PelangganController::class, 'setStatusAkun'])->name('api.pelanggan.set.status');
    
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
