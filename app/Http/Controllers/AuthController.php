<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line

class AuthController extends Controller
{
    // public function getLoginCredentials()
    // {
    //     $user = User::get();
    //     if ($user) {
    //     return [
    //         'email' => $user->email,
    //         'password' => $user->password,
    //     ];
    // }
    // return [
    //     'email' => '',
    //     'password' => '',
    // ];
    // }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json(['token' => $token, 'user' => $user], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }

    public function getUser(Request $request)
    {
        $user = User::get();
        return $user;
        // return response()->json($request->user(), 200);

    }
}
