<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'data' => '',
                'message' => 'credentials do not match'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = auth()->user();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken($user->email)->plainTextToken
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have succesfully been logged out'
        ]);
    }
}
