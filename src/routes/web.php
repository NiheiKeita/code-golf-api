<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/api/code-check', [CodeController::class, 'index'])->withoutMiddleware(ValidateCsrfToken::class);

// TODO: 別コンテナへ移行
Route::post('/api/api/code-check', [CodeController::class, 'check'])->name('check')->withoutMiddleware(ValidateCsrfToken::class);

Route::get('/api/questions/{question}/ranking', [RankingController::class, 'index']);
Route::apiResource('/api/questions', QuestionController::class);

Route::post('/api/users', [UserController::class, 'store'])->withoutMiddleware(ValidateCsrfToken::class);
Route::put('/api/users', [UserController::class, 'update'])->withoutMiddleware(ValidateCsrfToken::class);
