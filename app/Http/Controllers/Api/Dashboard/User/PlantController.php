<?php

namespace App\Http\Controllers\Api\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        $plants = User::query()->where('id', $request->user)
            ->with('plants.plants')
            ->get();

        return response()->json([
            'data' => $plants
        ], Response::HTTP_OK);
    }
}
