<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlantRequest;
use App\Models\Plant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plant::all();

        return response()->json([
            'data' => $plants
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlantRequest $request)
    {
        Plant::query()->create($request->validated());

        return response()->json([
            'message' => 'Plant created successfully'
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlantRequest $request, Plant $plant)
    {
        Plant::query()->create($request->validated());

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
