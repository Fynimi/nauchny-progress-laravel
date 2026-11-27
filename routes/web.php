<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;

// Главная и Категория — видны всем
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');

// вход и регистрация
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Журналист — только journalist и admin
Route::middleware(['auth', 'role:journalist,admin'])->group(function () {
    Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist.create');
    Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');
});

// Админка — только admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/texts/{id}/edit', [AdminController::class, 'edit'])->name('texts.edit');
    Route::post('/texts/{id}', [AdminController::class, 'update'])->name('texts.update');
    Route::post('/texts/{id}/delete', [AdminController::class, 'destroy'])->name('texts.destroy');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::post('/users/{id}/role', [AdminController::class, 'updateUserRole'])->name('users.role');
});
