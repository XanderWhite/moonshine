<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index']);
Route::get('/page/{page}', [NewsController::class, 'index'])->name('news.page')->where('page', '[0-9]+');
Route::get('/news/{id}', [NewsController::class, 'show'])->where('id', '[0-9]+');
