<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): string
    {
        return "index";
    }

    #[OA\Get(
        path: '/conference/create',
        responses: [
            new OA\Response(response: 200, description: 'OK'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function create(): string
    {
        return "index";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): string
    {
        return $request . "index";
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference): string
    {
        return $conference . "index";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference): string
    {
        return $conference . "index";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conference $conference): string
    {
        return $conference . "index" . $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference): string
    {
        return $conference . "index";
    }
}
