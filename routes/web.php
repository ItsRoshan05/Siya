<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashminController;
use App\Http\Controllers\DonationController;
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

// Register route
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Logout route
Route::any('logout', [AuthController::class, 'logout'])->name('logout');


//Admin Route
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('',[DashminController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('donations',DonationController::class);
});


// client Route
Route::get('/',[ClientController::class,'index']);
Route::post('/donation', [ClientController::class, 'storeDonation'])->name('donation.store');
Route::get('/thank-you', [ClientController::class, 'thankYou'])->name('thank-you');