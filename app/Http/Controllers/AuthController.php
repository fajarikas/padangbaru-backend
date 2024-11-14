<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            // $data = $request->validated();
            // $user = User::where('email', $data['email'])->first();

            // if (!$user || !Hash::check($data['password'], $user->password)) {
            //     return response()->json([
            //         "errors" => [
            //             "message" => "Email atau password salah"
            //         ]
            //     ], 401);
            // }
            // if ($user->role == "super admin") {
            //     return response()->json([
            //         'message' => 'Login Successfully',
            //         'data' => $user

            //     ], 200);
            // }

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $user = $request->user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'message' => 'Login Successfully',
                'token' => $token,
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 401);
        }
    }
}
