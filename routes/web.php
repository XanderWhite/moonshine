<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/tag/{url}', [NewsController::class, 'index'])->name('news.tag');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback.show');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.submit');
