<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Number;
Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/tag/{url}', [NewsController::class, 'index'])->name('news.tag');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');

    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', function () {
        return view('profile');
    });
});
