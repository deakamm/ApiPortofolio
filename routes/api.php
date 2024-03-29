<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class,'register'] );
Route::post('login', [AuthController::class,'login'] );

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout', [AuthController::class,'logout'] );
    Route::Resource('portofolios' ,PortofolioController::class);
    
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });