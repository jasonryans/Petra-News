<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AuthController;

// Jika belum login, akan dialihkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes yang tidak perlu autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group route untuk area yang membutuhkan login
Route::middleware('auth')->group(function () {
    // Route untuk News
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create'); // ← Form create
    Route::post('/news', [NewsController::class, 'store'])->name('news.store'); // ← Menyimpan News
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

    // Admin area
    Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::post('/admin/news/{news}/approve', [AdminNewsController::class, 'approve'])->name('admin.news.approve');
    Route::post('/admin/news/{news}/reject', [AdminNewsController::class, 'reject'])->name('admin.news.reject');
});