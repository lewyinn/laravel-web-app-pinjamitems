<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm']);
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Dashboard (akses semua role)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index', 'dashboardData'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/loans', [LoanController::class, 'loans'])->name('pinjamBarang');
    Route::post('items/borrow', [LoanController::class, 'borrow'])->name('items.borrow');
    Route::post('/loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');

    Route::match(['get', 'post'], '/logs', [LogController::class, 'handle'])->name('logs');
    Route::put('/logs/{user}', [LogController::class, 'handle'])->name('logs.update');
    Route::delete('/logs/{user}', [LogController::class, 'handle'])->name('logs.delete');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::match(['get', 'post'], '/users', [UserController::class, 'handle'])->name('users');
    Route::put('/users/{user}', [UserController::class, 'handle'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'handle'])->name('users.delete');

    Route::match(['get', 'post'], '/items', [ItemController::class, 'handle'])->name('items');
    Route::put('/items/{item}', [ItemController::class, 'handle'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'handle'])->name('items.delete');
});
