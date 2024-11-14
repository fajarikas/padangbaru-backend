<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function register(Request $request)
    {
        try {
            // Validasi input termasuk gender
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',


                'email.required' => 'Email harus diisi.',
                'email.string' => 'Email harus berupa teks.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
                'email.unique' => 'Email ini sudah terdaftar.',

                'password.required' => 'Password harus diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password harus minimal 8 karakter.',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // Buat token API untuk pengguna
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'message' => 'User Registered Successfully',
                'token' => $token,
                'data' => [$user],
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
