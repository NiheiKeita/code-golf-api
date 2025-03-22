<?php

namespace App\Http\Controllers;

use App\Models\Question;

class RankingController extends Controller
{
    public function index(Question $question)
    {
        $codes = $question->getMaxCodeBytePerUser();

        return response()->json(['codes' => $codes]);
    }

}
