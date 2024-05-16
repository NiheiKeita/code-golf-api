<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RankingController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/api/code-check', [CodeController::class, 'index'])->withoutMiddleware(ValidateCsrfToken::class);
Route::post('/api/api/code-check', [CodeController::class, 'check'])->name('check')->withoutMiddleware(ValidateCsrfToken::class);
Route::get('/api/questions', [QuestionController::class, 'index'])->name('question_list');
Route::get('/api/questions/{id}', [QuestionController::class, 'show']);
Route::get('/api/questions/{id}/ranking', [RankingController::class, 'index']);