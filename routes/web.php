<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    Route::view('login', 'login' )->name('login');
    Route::post('login', 'auth'  )->name('auth');
    Route::get('logout', 'logout')->name('logout');
    Route::get('me',     'me'    )->name('me');
});

// Question Routes
Route::get('', [QuestionController::class, 'index'])->name('index');
Route::get('{question}/delete', [QuestionController::class, 'delete'])->name('question.delete');
Route::resource('question', QuestionController::class)->except(['index']);
