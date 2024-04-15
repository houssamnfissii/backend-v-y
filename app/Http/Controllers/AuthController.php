<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    use HttpResponses;

    public function login()
    {
        return 'HEY';
    }

    // public function register(StoreUserRequest $request){
    //     $request ->validated($request->all());
    //     $user = User::create([
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);
    //     return $this->success([
    //         'user' => $user,
    //         'token' => $user->createToken('API Token of '.$user->name)->plainTextToken
    //     ]);
    // }
    public function register(Request $request)
    {
        if (empty($request->all())) {
            return response()->json(['error' => 'No data provided.'], 422);
        }
    
        $validatedData = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','max:255','unique:users'],
            'password' => ['required','confirmed',Password::defaults()]
        ]);

        $user = User::create([
            "name" => $validatedData['name'],
            "email" => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        $token = $user->createToken('API Token of ' . $user->name)->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully.',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 201);
    }


    public function logout()
    {
        return response()->json("logout");
    }
}
