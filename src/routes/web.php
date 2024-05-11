<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\QuestionController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/api/code-check', [CodeController::class, 'index'])->withoutMiddleware(ValidateCsrfToken::class);
Route::get('/api/api/code-check', [CodeController::class, 'check'])->withoutMiddleware(ValidateCsrfToken::class);
Route::get('/api/questions', [QuestionController::class, 'index'])->name('question_list');
// Route::post('/api/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
//     return ['token' => $token->plainTextToken];
// })->withoutMiddleware(ValidateCsrfToken::class);