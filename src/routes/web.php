<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/code-check', [CodeController::class, 'index'])->name('code_check');
