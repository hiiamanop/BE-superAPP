<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');