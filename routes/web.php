<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstallmentsController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
// use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication Routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
// Route::get('password/reset', [PasswordController::class, 'request'])->name('password.request');
// Route::post('password/email', [PasswordController::class, 'email'])->name('password.email');
// Route::get('password/reset/{token}', [PasswordController::class, 'reset'])->name('password.reset');
// Route::post('password/reset', [PasswordController::class, 'update'])->name('password.update');

// Vehicle Routes
Route::resource('vehicles', VehicleController::class);

// Credit Routes
Route::resource('credits', CreditController::class);

// Cuota Routes

// Admin Middleware for admin routes
Route::middleware('admin')->group(function () {
    // You can define admin-specific routes here if needed
});

Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('admin/credits', [AdminController::class, 'index'])->name('admin.credits.index');
    Route::get('admin/credits/{id}', [AdminController::class, 'show'])->name('admin.credits.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('installments', InstallmentsController::class);

});



require __DIR__.'/auth.php';
