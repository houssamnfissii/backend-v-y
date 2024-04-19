<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|min:5|max:15|regex:/^(?=.[a-z])(?=.[A-Z]).+$/',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    return response()->json(['message' => 'User registered successfully', 'user' => $user]);
}

    public function login(Request $request){
        if (!Auth::attempt($request->only('email','password'))) {
            return response([
                'message' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }
    
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
    
        $cookie = cookie('jwt', $token, 60 * 24);
    
        return response([
            'message' => 'success',
            'token' => $token 
        ])->withCookie($cookie);
    }

    public function logout(Request $request){
        //auth()->user()->tokens()->delete();
        $cookie=Cookie::forget('jwt');

        return response()->json([
            'message'=>'Success'
        ],200);

    }
    
}