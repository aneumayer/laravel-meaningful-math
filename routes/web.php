<?php

use Illuminate\Support\Facades\Route;

// Views
Route::get('/create',            App\Http\Controllers\CreateController::class)->name('create');
Route::get('/{question}/edit',   App\Http\Controllers\EditController::class  )->name('edit');
Route::get('/{question}/delete', App\Http\Controllers\DeleteController::class)->name('delete');

// API Calls
Route::get('/',              App\Http\Controllers\IndexController::class  )->name('index');
// Restricted by auth code
Route::middleware(App\Http\Middleware\MathAuthMiddleware::class)->group(function () {
    Route::post('/',             App\Http\Controllers\StoreController::class  )->name('store');
    Route::put('/{question}',    App\Http\Controllers\UpdateController::class )->name('update');
    Route::delete('/{question}', App\Http\Controllers\DestroyController::class)->name('destroy');
});
