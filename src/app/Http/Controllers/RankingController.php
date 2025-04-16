<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Symfony\Component\HttpFoundation\JsonResponse;

class RankingController extends Controller
{
    public function index(Question $question): JsonResponse
    {
        $codes = $question->getMaxCodeBytePerUser();

        return response()->json(['codes' => $codes]);
    }
}
