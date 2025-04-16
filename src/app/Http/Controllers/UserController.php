<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $user = User::create([
            "name" => $request->name,
        ]);
        return [
            "name" => $user->name,
            "id" => $user->id,
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function update(Request $request): array
    {
        /** @var \App\Models\User $user */
        $user = User::findOrFail($request->user_id);
        $user->update([
            "name" => $request->name,
        ]);
        return [
            "name" => $user->name,
            "id" => $user->id,
        ];
    }
}
