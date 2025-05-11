<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminNewsController;

// Jika belum login, akan dialihkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk preview artikel yang akan di-review oleh admin
Route::get('/admin/news/review/{news}', [AdminNewsController::class, 'review'])->name('admin.news.review');

// Route untuk menyetujui artikel
Route::post('/admin/news/{news}/approve', [AdminNewsController::class, 'approve'])->name('admin.news.approve');

// Route untuk menolak artikel
Route::post('/admin/news/{news}/reject', [AdminNewsController::class, 'reject'])->name('admin.news.reject');

// Route yang sudah ada untuk takedown
Route::post('/admin/news/{news}/takedown', [AdminNewsController::class, 'takedown'])->name('admin.news.takedown');

// Admin News Routes
Route::prefix('admin/news')->name('admin.news.')->group(function () {
    Route::get('/', [AdminNewsController::class, 'index'])->name('index');
    Route::get('/review/{news}', [AdminNewsController::class, 'review'])->name('review');
    Route::post('/{news}/approve', [AdminNewsController::class, 'approve'])->name('approve');
    Route::post('/{news}/reject', [AdminNewsController::class, 'reject'])->name('reject');
    Route::post('/{news}/takedown', [AdminNewsController::class, 'takedown'])->name('takedown');
    Route::post('/{news}/clear-memo', [AdminNewsController::class, 'clearMemo'])->name('clearMemo');
    Route::delete('/{id}', [AdminNewsController::class, 'destroy'])->name('destroy');
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
    Route::post('/news', [NewsController::class, 'store'])->name('news.store'); 
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create'); 
    Route::get('/news/history', [NewsController::class, 'history'])->name('news.history');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/view-submission/{id}', [NewsController::class, 'viewSubmission'])->name('news.viewSubmission');
    Route::get('/news/{id}/complete', [NewsController::class, 'complete'])->name('news.complete');
        
     // Admin area
     Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
     Route::post('/admin/news/{news}/approve', [AdminNewsController::class, 'approve'])->name('admin.news.approve');
     Route::post('/admin/news/{news}/reject', [AdminNewsController::class, 'reject'])->name('admin.news.reject');
     Route::post('/admin/news/{news}/takedown', [AdminNewsController::class, 'takedown'])->name('admin.news.takedown');
     Route::post('/admin/news/{news}/clear-memo', [AdminNewsController::class, 'clearMemo'])->name('admin.news.clear_memo');
 });