<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VisaApplicationController;
use App\Http\Controllers\DocumentController;

// 🌐 Public routes
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// 🔐 Authenticated routes
Route::middleware('auth:sanctum')->group(function () {

    // 🔐 Authenticated logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // 👤 Client profile
    Route::get('/client/profile', [ClientProfileController::class, 'show']);

    // 🛂 Admin dashboard
    Route::get('/admin/overview', [AdminDashboardController::class, 'index']);

    // 📄 Visa applications
    Route::get('/applications', [VisaApplicationController::class, 'index']);
    Route::post('/applications', [VisaApplicationController::class, 'store']);

    // 📎 Document upload + list
    Route::post('/applications/{applicationId}/documents', [DocumentController::class, 'store']);
    Route::get('/applications/{applicationId}/documents', [DocumentController::class, 'index']);

    // ✅❌ Admin document actions
    Route::post('/documents/{id}/approve', [DocumentController::class, 'approve']);
    Route::post('/documents/{id}/reject', [DocumentController::class, 'reject']);

    // 🛂 Admin visa review
    Route::get('/admin/applications', [AdminDashboardController::class, 'index']);
    Route::get('/admin/applications/{id}', [AdminDashboardController::class, 'show']);
    Route::patch('/admin/applications/{id}/status', [AdminDashboardController::class, 'updateStatus']);

});
