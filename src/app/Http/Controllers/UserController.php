<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request): Array
    {
        $user = User::create([
            "name" => $request->name,
        ]);
        $data = [
            "name" => $user->name,
            "id" => $user->id,
        ];
        return $data;
    }
    public function update(Request $request): Array
    {
        // return ["dd"=>$request->user_id];
        $user = User::find($request->user_id);
        $user->update([
            "name" => $request->name,
        ]);
        $data = [
            "name" => $user->name,
            "id" => $user->id,
        ];
        return $data;
    }
    
}
