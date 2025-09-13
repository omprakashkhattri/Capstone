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

// Admin Login
Route::get('/login/admin', [AuthController::class, 'adminLogin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'adminLoginSubmit'])->name('login.admin.submit');

// Admin Forgot Password
Route::get('/password/admin/forgot', [AuthController::class, 'adminForgotPassword'])->name('password.request.admin');
Route::post('/password/admin/forgot', [AuthController::class, 'adminForgotPasswordSubmit'])->name('password.request.admin.submit');

// Admin Dashboard
Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');


// ============================
// User Authentication
// ============================

// User Login
Route::get('/login/user', [AuthController::class, 'userLogin'])->name('login.user');
Route::post('/login/user', [AuthController::class, 'userLoginSubmit'])->name('login.user.submit');

// User Registration
Route::get('/register/user', [AuthController::class, 'userRegister'])->name('register.user');
Route::post('/register/user', [AuthController::class, 'userRegisterSubmit'])->name('register.user.submit');

// User Forgot Password
Route::get('/password/user/forgot', [AuthController::class, 'userForgotPassword'])->name('password.request.user');
Route::post('/password/user/forgot', [AuthController::class, 'userForgotPasswordSubmit'])->name('password.request.user.submit');

// User Dashboard
Route::get('/user/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');


// ============================
// Employee Authentication (Driver & Staff)
// ============================

// Employee Login Page (GET)
Route::get('/employee/login', [EmployeeAuthController::class, 'showLoginForm'])->name('login.employee');

// Employee Login Submit (POST)
Route::post('/employee/login', [EmployeeAuthController::class, 'authenticate'])->name('login.employee.submit');

// Employee Forgot Password
Route::get('/employee/forgot-password', [EmployeeAuthController::class, 'showForgotPassword'])->name('employee.forgot-password');
Route::post('/employee/forgot-password', [EmployeeAuthController::class, 'sendResetLink'])->name('employee.send-reset-link');

// Employee Reset Password
Route::get('/employee/reset-password/{token}', [EmployeeAuthController::class, 'showResetForm'])->name('employee.reset-password');
Route::post('/employee/reset-password', [EmployeeAuthController::class, 'resetPassword'])->name('employee.reset-password.post');

// Employee Dashboards
Route::get('/employee/driver/dashboard', fn() => view('employee.driver-dashboard'))->name('driver.dashboard');
Route::get('/employee/staff/dashboard', fn() => view('employee.staff-dashboard'))->name('staff.dashboard');


// ============================
// Logout (Shared by Admin/User/Employee)
// ============================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ============================
// Vehicles Listing
// ============================
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
