<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('auth.login');
});

// Dashboard
Route::controller(DashboardController::class)->group(function () {
   Route::name('dashboard.')->group(function () {
      Route::get('/dashboard', 'index')->name('index');
   });
});

// Users
Route::controller(UsersController::class)->group(function () {
   Route::name('kelola-pengguna.')->group(function () {
      Route::get('/kelola-pengguna', 'index')->name('index');
      Route::get('/kelola-pengguna/tambah-pengguna', 'create')->name('create');
   });
});
