<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservasiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[LoginController::class,'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/reservasi/create', [ReservasiController::class, 'store']);
    Route::get('/kartu-imunisasi', [ReservasiController::class, 'KartuImunisasi']);
}
);

