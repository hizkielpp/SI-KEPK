<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EthicalClearanceController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Authentication
Route::controller(AuthController::class)->group(function () {
   Route::get('/', 'login')->name('login');
   Route::post('/auth', 'auth')->name('auth');
   Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
   // Must authenticated
   // Dashboard
   Route::controller(DashboardController::class)->group(function () {
      // Proposal
      Route::controller(ProposalController::class)->group(function () {
         Route::name('proposal.')->group(function () {
            Route::get('/proposal', 'index')->name('index');
            Route::get('/proposal/create', 'create')->name('create');
            Route::post('/proposal/insert', 'insert')->name('insert');
         });
      });
      // Ethical Clearance
      Route::controller(EthicalClearanceController::class)->group(function () {});
      // Surat masuk
      Route::controller(SuratMasukController::class)->group(function () {
         Route::name('surat-masuk.')->group(function () {
            Route::get('/surat-masuk', 'index')->name('index');
         });
      });

      // Users
      Route::controller(UsersController::class)->group(function () {
         Route::name('user.')->group(function () {
            Route::get('/user', 'index')->name('index');
            Route::get('/user/tambah-pengguna', 'create')->name('create');
         });
      });
      Route::name('dashboard.')->group(function () {
         Route::get('/dashboard', 'index')->name('index');
      });
   });
});
