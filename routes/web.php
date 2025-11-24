<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoListController;

// Ana Sayfa Rotası
Route::get('/', [RegisterController::class, 'showHomePage'])->name('home');

// Sadece giriş yapmamış kullanıcıların erişebileceği rotalar
Route::middleware('guest')->group(function () {
    // Kayıt Rotaları
    Route::get('/kayit', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/kayit', [RegisterController::class, 'register'])->name('register.submit');
    
    // Giriş Rotaları
    Route::get('/giris', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/giris', [LoginController::class, 'login'])->name('login.submit');
});

// Sadece giriş yapmış kullanıcıların erişebileceği rotalar
Route::middleware('auth')->group(function () {
    // Yapılacaklar Listesi Rotaları
    Route::get('/todolist', [TodoListController::class, 'index'])->name('todolist.index');
    Route::post('/todolist', [TodoListController::class, 'store'])->name('todolist.store');
    
    // YENİ: Görev Silme Rotası
    Route::delete('/todolist/{task}', [TodoListController::class, 'destroy'])->name('todolist.destroy');
    
    // Çıkış Rotası
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

