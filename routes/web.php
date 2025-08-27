<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Routes for user auth
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'destroy'])->name('logout');
});

// API Calls
Route::get('/',              App\Http\Controllers\IndexController::class  )->name('index');
// Restricted by auth code
Route::middleware(['role:admin'])->group(function () {
    // Views
    Route::get('create',            App\Http\Controllers\CreateController::class)->name('create');
    Route::get('{question}/edit',   App\Http\Controllers\EditController::class  )->name('edit');
    Route::get('{question}/delete', App\Http\Controllers\DeleteController::class)->name('delete');

    // Actions
    Route::post('',             App\Http\Controllers\StoreController::class  )->name('store');
    Route::put('{question}',    App\Http\Controllers\UpdateController::class )->name('update');
    Route::delete('{question}', App\Http\Controllers\DestroyController::class)->name('destroy');

    // Auth
    Route::get('me', [AuthController::class, 'me']);
});

