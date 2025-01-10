<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashminController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\UserController;
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


// Login route
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Logout route
Route::any('logout', [AuthController::class, 'logout'])->name('logout');

// // Register route
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);



//Admin Route
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('',[DashminController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('donations',DonationController::class);
    Route::resource('pengeluarans', PengeluaranController::class);
    Route::post('donations/toggle-verification', [DonationController::class, 'toggleVerification'])->name('donations.toggleVerification');
    Route::resource('kegiatans', KegiatanController::class);
    Route::get('/testing',[DashminController::class,'testing']);
    Route::resource('/donaturs', DonaturController::class);
    Route::get('/laporan-pengeluaran', [PengeluaranController::class, 'laporanPengeluaran'])->name('laporan.pengeluaran');
    Route::get('/laporan-pengeluaran/export-pdf', [PengeluaranController::class, 'exportPDF'])->name('laporan.pengeluaran.pdf');
    Route::get('/laporan-pengeluaran/export-excel', [PengeluaranController::class, 'exportExcel'])->name('laporan.pengeluaran.excel');
    Route::get('/laporan-donasi', [DonationController::class, 'laporanDonasi'])->name('laporan.donasi');
    Route::get('/laporan-donasi/export-pdf', [PengeluaranController::class, 'exportPDF'])->name('laporan.donasi.pdf');
    Route::get('/laporan-donasi/export-excel', [PengeluaranController::class, 'exportExcel'])->name('laporan.donasi.excel');
    Route::get('/profile/change-password', [UserController::class, 'ubahPasswordForm'])->name('password.change');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('password.update');
});


// client Route
Route::get('/',[ClientController::class,'index']);
Route::post('/donation', [ClientController::class, 'storeDonation'])->name('donation.store');
Route::get('/thank-you/{order_id}', [ClientController::class, 'thankYou'])->name('thank-you');

