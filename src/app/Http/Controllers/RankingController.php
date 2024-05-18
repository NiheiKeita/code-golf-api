<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request)
    {
        $question = Question::find($request->id);
        $codes = $question->codes()->get()->groupBy('user_id')->map(function ($group) {
            return $group->sortBy('code_byte')->first();
        })->sortBy('code_byte');
        // $codes = $question->codeRanking();
        
        return response()->json(['codes' => $codes]);
    }
    
}
