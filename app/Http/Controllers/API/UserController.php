<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required','string','max:255'],
                'email' => ['required','string','email','max:255','unique:users'],
                'password' => ['required','string', new Password],
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Buat akun berhasil',
                'data' => [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]
        ], 200);
        
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'Error',
                'message' => 'Register Gagal',
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','string','email'],
            'password' => ['required','string'],
        ]);

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                'status_code' => 500,
                'status' => 'Error',
                'message' => 'Login Gagal',
            ], 500);
        }
        try {

            $user = User::where('email', $request->email)->first();

            if(!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            // return ResponseFormatter::success([
            //     'access_token' => $tokenResult,
            //     'token_type' => 'Bearer',
            //     'user' => $user
            // ], 'Login Berhasil');
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Login berhasil',
                'data' => [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]
            ], 200);

        } catch(Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'Error',
                'message' => 'Login Gagal',
            ], 500);
        }
    }

    public function fetch(Request $request)
    {
        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data profile user berhasil ditambahkan',
            'data' => $request->user()
        ], 200);

    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Token Revoked',
            'data' => $token
        ], 200);

    }
}
