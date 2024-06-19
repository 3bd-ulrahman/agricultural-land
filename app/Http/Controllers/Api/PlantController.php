<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlantRequest;
use App\Models\Plant;
use Illuminate\Support\Facades\Storage;
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
        $image = Storage::disk(STORAGE_DISK)->put('images/plants', $request->file('image'));

        Plant::query()->create(['image' => $image] + $request->validated());

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
        Storage::disk(STORAGE_DISK)->delete($plant->image);

        $plant->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
