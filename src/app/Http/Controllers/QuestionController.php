<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $data = Question::get();
        return response()->json(['questions' => $data]);
        return $data;
    }
    public function show(Request $request)
    {
        $data = Question::find($request->id);
        return response()->json(['question' => $data]);
    }

}
