<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeAuthController;

// ============================
// Home Page
// ============================
Route::get('/', fn() => view('home'))->name('home');


// ============================
// Admin Authentication
// ============================
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'adminLogin'])->name('login.admin');
    Route::post('/login', [AuthController::class, 'adminLoginSubmit'])->name('login.admin.submit');

    // Forgot Password
    Route::get('/password/forgot', [AuthController::class, 'adminForgotPassword'])->name('password.request.admin');
    Route::post('/password/forgot', [AuthController::class, 'adminForgotPasswordSubmit'])->name('password.request.admin.submit');

    // Dashboard (protected)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    });
});


// ============================
// User Authentication
// ============================
Route::prefix('user')->group(function () {
    // Login & Registration
    Route::get('/login', [AuthController::class, 'userLogin'])->name('login.user');
    Route::post('/login', [AuthController::class, 'userLoginSubmit'])->name('login.user.submit');

    Route::get('/register', [AuthController::class, 'userRegister'])->name('register.user');
    Route::post('/register', [AuthController::class, 'userRegisterSubmit'])->name('register.user.submit');

    // Forgot Password
    Route::get('/password/forgot', [AuthController::class, 'userForgotPassword'])->name('password.request.user');
    Route::post('/password/forgot', [AuthController::class, 'userForgotPasswordSubmit'])->name('password.request.user.submit');

    // Protected Pages
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');
        Route::get('/profile', fn() => view('user.profile'))->name('user.profile');
        Route::get('/bookings', fn() => view('user.bookings'))->name('user.bookings');
        Route::get('/payments', fn() => view('user.payments'))->name('user.payments');
        Route::get('/vehicles', fn() => view('user.vehicles'))->name('user.vehicles');
        Route::get('/reviews', fn() => view('user.reviews'))->name('user.reviews');
        Route::get('/schedule', fn() => view('user.schedule'))->name('user.schedule');
    });
});


// ============================
// Employee Authentication (Driver & Staff)
// ============================
Route::prefix('employee')->group(function () {
    // Login
    Route::get('/login', [EmployeeAuthController::class, 'showLoginForm'])->name('login.employee');
    Route::post('/login', [EmployeeAuthController::class, 'authenticate'])->name('login.employee.submit');

    // Forgot & Reset Password
    Route::get('/forgot-password', [EmployeeAuthController::class, 'showForgotPassword'])->name('employee.forgot-password');
    Route::post('/forgot-password', [EmployeeAuthController::class, 'sendResetLink'])->name('employee.send-reset-link');
    Route::get('/reset-password/{token}', [EmployeeAuthController::class, 'showResetForm'])->name('employee.reset-password');
    Route::post('/reset-password', [EmployeeAuthController::class, 'resetPassword'])->name('employee.reset-password.post');

    // Dashboards (protected)
    Route::middleware('auth:employee')->group(function () {
        Route::get('/driver/dashboard', fn() => view('employee.driver-dashboard'))->name('driver.dashboard');
        Route::get('/staff/dashboard', fn() => view('employee.staff-dashboard'))->name('staff.dashboard');
    });
});


// ============================
// Logout (Shared by Admin/User/Employee)
// ============================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ============================
// Vehicles Listing
// ============================
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
