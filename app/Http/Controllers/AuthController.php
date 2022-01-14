<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }




    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => ['required', Password::min(6)->mixedCase()], 
                'name' => 'required|string|max:255', 
                'email' => 'required|string|max:255|email'
            ]
        );
        if ($validator->fails()) 
            return response()->json($validator->errors());

        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => Hash::make($request->password)]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data' => $user, 'acess_token' => $token, 'token_type' => 'Bearer']);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['poruka' => 'Pogrešan email ili lozinka!']);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('LoginToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['Uspešno ste se izlogovali!']);
    }
}
