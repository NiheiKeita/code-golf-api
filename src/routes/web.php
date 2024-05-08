<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/api/code-check', [CodeController::class, 'index'])->name('code_check');
Route::get('/api/questions', [QuestionController::class, 'index'])->name('question_list');
