<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\EmailController;

// Jika belum login, arahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes untuk guest (tidak perlu autentikasi)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang hanya bisa diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {
    
    // Routes untuk News
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/about', [NewsController::class, 'about'])->name('news.about');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/history', [NewsController::class, 'history'])->name('news.history');
    Route::get('/news/drafts', [NewsController::class, 'drafts'])->name('news.drafts');
    
    // Gunakan Route Model Binding
    Route::get('/news/confirm/{id}', [NewsController::class, 'confirm'])->name('news.confirm');
    Route::get('/news/view-submission/{news}', [NewsController::class, 'viewSubmission'])->name('news.viewSubmission');
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::get('/news/{news}/complete', [NewsController::class, 'complete'])->name('news.complete');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::post('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::post('/news/{id}/submit-for-approval', [NewsController::class, 'submitForApproval'])->name('news.submitForApproval');

    // Routes untuk Admin
    Route::get('send-mail', [EmailController::class, 'BroadcastMail']); //testing kirim email
    Route::get('/admin/akses', [AdminNewsController::class, 'akses'])->name('admin.access.index');
    Route::patch('/admin/akses/{user}', [AdminNewsController::class, 'updateRole'])->name('admin.updateRole');


    Route::prefix('admin/news')->name('admin.news.')->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::get('/review/{news}', [AdminNewsController::class, 'review'])->name('review');
        Route::post('/{news}/approve', [AdminNewsController::class, 'approve'])->name('approve');
        Route::post('/{news}/reject', [AdminNewsController::class, 'reject'])->name('reject');
        Route::post('/{news}/takedown', [AdminNewsController::class, 'takedown'])->name('takedown');
        Route::post('/{news}/clear-memo', [AdminNewsController::class, 'clearMemo'])->name('clear_memo');
        Route::post('/{news}/broadcast', [AdminNewsController::class, 'broadcast'])->name('broadcast');
    });
});
