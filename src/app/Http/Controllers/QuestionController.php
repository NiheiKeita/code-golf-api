<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index(): JsonResponse
    {
        $data = Question::all();
        return response()->json(['questions' => $data]);
    }

    public function show(Question $question): JsonResponse
    {
        return response()->json(['question' => $question]);
    }
}
