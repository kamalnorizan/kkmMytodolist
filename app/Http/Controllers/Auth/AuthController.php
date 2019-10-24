<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request) 
    {
    	$request->validate([
    		'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
    	]);

    	$user = new User();
    	$user -> name = $request->name;
    	$user -> username = $request->username;
    	$user -> email = $request->email;
    	$user -> password = bcrypt($request->password);
    	$user -> save();

    	return response()->json(['message' => 'User Created Successfully'], 201);
    }

    public function login(Request $request) 
    {
    	$request->validate([
    		'username' => 'required|string',
    		'password' => 'required|string',
    	]);

    	$credentials = request(['username', 'password']);

    	if(!Auth::attempt($credentials)){
    		return response()->json(['message' => 'Unauthorized'], 401);
    	}

    	$user = $request->user();
    	$tokenResult = $user->createToken('Personal Access Token');
    	$token = $tokenResult->token;
    	$token->save();

    	return response()->json([
    		'access_token' => $tokenResult->accessToken,
    		'token_type' => 'Bearer',
    		'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
    	]);
    }
}
