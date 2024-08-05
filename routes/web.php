<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPage');
});

// log
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LogController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('app.DashboardPage'); // Your dashboard view
    })->name('dashboard');
    Route::get('/logout', [LogController::class, 'logout'])->name('logout');
});

// register
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Role table
Route::resource('roles', RoleController::class);

// User Table
Route::resource('users', UserController::class);

// admin table
Route::resource('admins', AdminController::class);

// guru Table
Route::resource('gurus', GuruController::class);

// siswa table
Route::resource('siswas', SiswaController::class);