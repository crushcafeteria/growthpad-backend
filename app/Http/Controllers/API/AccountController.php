<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Models\User;

class AccountController extends Controller
{

    function login()
    {
        $validator = Validator::make(request()->all(), [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        $credentials = request()->only(['email', 'password']);
        $token       = JWTAuth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'error' => 'Invalid credentials'
            ]);
        }

        return response()->json([
            'user'       => auth()->user(),
            'token' => [
                'value'     => $token,
                'type'      => 'bearer',
                'expiry'    => Carbon::now()->addMinutes(env('JWT_TTL'))->timestamp,
            ]
        ]);
    }

    function me()
    {
        return auth()->user();
    }

    function signup()
    {
        $user = request()->only(['name', 'email', 'telephone', 'gender', 'county', 'password']);
        $validator = Validator::make($user, [
            'name'     => 'required',
            'email'     => 'required|email|unique:users',
            'telephone' => 'required|unique:users',
            'gender'    => 'required',
            'county'    => 'required',
            'password'  => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        # Create new user
        $user['password'] = bcrypt($user['password']);
        $user['privilege'] = 'USER';
        $user = User::create($user);

        # Login user
        $token = JWTAuth::attempt(request()->only(['email', 'password']));

        return response()->json([
            'user'     => $user,
            'token' => [
                'value'     => $token,
                'type'      => 'bearer',
                'expiry'    => config('jwt.ttl'),
            ],
        ]);
    }
}
