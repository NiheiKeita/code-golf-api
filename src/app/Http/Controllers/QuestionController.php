<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $data = Question::all();
        return response()->json(['questions' => $data]);
    }

    public function show(Question $question)
    {
        return response()->json(['question' => $question]);
    }
}
