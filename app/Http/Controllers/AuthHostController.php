<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Host;
use Illuminate\Support\Facades\Hash;

class AuthHostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
     {
         $user = User::create([
             'email' => $request->input('email'),
             'password' => Hash::make($request->input('password')),
             'type' => "host",
             'status' => '1'
         ]);
     
         $userId = $user->id;
     
         $host = Host::create([
             'user_id' => $userId,
             'first_name' => $request->input('first_name'),
             'company_name' => $request->input('company_name'),
             'birth_date' => $request->input('birth_date'),
             'address' => $request->input('address'),
             'telephone' => $request->input('telephone'),
             'last_name' => $request->input('last_name'),
             'CIN' => $request->input('CIN'), 
         ]);
     
         return response()->json(['message' => 'User registered successfully', 'user' => $user, 'host' => $host]);
     }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
