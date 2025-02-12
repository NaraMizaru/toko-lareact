<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/auth/login');

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login')->name('post.login');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminDashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
        });

        Route::controller(AdminKategoriController::class)->group(function () {
            Route::get('/kategori', 'index')->name('admin.kategori');
            Route::post('/kategori/store/{id?}', 'store')->name('admin.kategori.store');
            Route::get('/kategori/data/{id}', 'dataById')->name('admin.kategori.data.id');
            Route::get('/kategori/delete/{id}', 'delete')->name('admin.kategori.delete');
        });
    });
});
