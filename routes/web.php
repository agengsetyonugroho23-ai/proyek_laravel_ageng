<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function() {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('surat-masuk', SuratMasukController::class)->parameters(['surat-masuk' => 'id']);
    Route::resource('surat-keluar', SuratKeluarController::class)->parameters(['surat-keluar' => 'id']);
    //Route::resource('surat-masuk', SuratMasukController::class)->only(['index', 'show'])->parameters(['surat-masuk' => 'id']);
    //Route::resource('surat-masuk', SuratMasukController::class)->except(['index', 'show'])->parameters(['surat-masuk' => 'id'])->middleware('can:manage-letters');
});