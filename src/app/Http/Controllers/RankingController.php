<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request): Array
    {
        $data =[
            [
                "user_id" => 1,
                "byte" => 55,
            ],
            [
                "user_id" => 23,
                "byte" => 56,
            ],
            [
                "user_id" => 3,
                "byte" => 57,
            ],
        ];
        return $data;
    }
    
}
