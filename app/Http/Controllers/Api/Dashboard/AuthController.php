<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function login(Request $request)
    {
        if (!Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'data' => '',
                'message' => 'credentials do not match'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $admin = auth('admin')->user();

        return response()->json([
            'user' => $admin,
            'token' => $admin->createToken($admin->email)->plainTextToken
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        Auth::guard('admin')->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
