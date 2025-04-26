<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminNewsController;

Route::get('/', [NewsController::class, 'index'])->name('news.index'); // ← Halaman utama news
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create'); // ← Form create
Route::post('/news', [NewsController::class, 'store'])->name('news.store'); // ← Menyimpan News


// Admin area
Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
Route::post('/admin/news/{news}/approve', [AdminNewsController::class, 'approve'])->name('admin.news.approve');
Route::post('/admin/news/{news}/reject', [AdminNewsController::class, 'reject'])->name('admin.news.reject');
