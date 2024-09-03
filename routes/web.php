<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\UserAuthentication;

Route::get('/', [GuestController::class, 'index']);
Route::get('index', [GuestController::class, 'index']);
Route::get('login', [GuestController::class, 'login']);
Route::get('register', [GuestController::class, 'register']);
Route::get('about', [GuestController::class, 'about']);
Route::get('gallery', [GuestController::class, 'gallery']);
Route::get('contact', [GuestController::class, 'contact']);
Route::post('register_action', [GuestController::class, 'register_action']);
Route::get('verifyAccount/{email}/{token}', [GuestController::class, 'verify_email']);
Route::post('checkAuthentication', [GuestController::class, 'login_action']);

// User Routes
Route::middleware([UserAuthentication::class])->group(function () {
    // Route::get('UserProfile', [UserController::class, 'user_profile']);
    // Route::post('UpdateUserProfile', [UserController::class, 'update_user_profile']);
    // Route::get('UserChangePassword', [UserController::class, 'change_password']);
    // Route::post('UpdateUserPassword', [UserController::class, 'update_user_password']);
    // Route::get('UserDeleteAccount', [UserController::class, 'delete_account']);
    Route::get('UserDashboard', [UserController::class, 'user_dashboard']);
    Route::get('UserLogout', [UserController::class, 'logout']);
});

// Admin Routes
Route::middleware([AdminAuthentication::class])->group(function () {
    Route::get('AdminDashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('AdminLogout', [AdminController::class, 'logout']);
});
