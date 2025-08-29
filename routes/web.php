<?php

use App\Http\Controllers\Auth\{
    LoginController,
    LogoutController,
    MeController,
};
use App\Http\Controllers\Question\{
    DestroyController,
    IndexController,
    StoreController,
    UpdateController
};
use App\Models\Question;
use Illuminate\Support\Facades\Route;

// Views
Route::get('/', IndexController::class)->name('index');

// Auth
Route::view('login', 'login')->name('login');
Route::post('login', LoginController::class);

// Restricted by auth
Route::middleware(['auth'])->group(function () {
    // Views
    Route::view('create', 'create')->name('create');
    Route::get('{question}/edit', function (Question $question) {
        return view('edit', ['question' => $question]);
    })->name('edit');
    Route::get('{question}/delete', function (Question $question) {
        return view('delete', ['question' => $question]);
    })->name('delete');

    // Actions
    Route::post('',             StoreController::class)->name('store');
    Route::put('{question}',    UpdateController::class)->name('update');
    Route::delete('{question}', DestroyController::class)->name('destroy');

    // Auth
    Route::get('me',     MeController::class)->name('me');
    Route::get('logout', LogoutController::class)->name('logout');
});
