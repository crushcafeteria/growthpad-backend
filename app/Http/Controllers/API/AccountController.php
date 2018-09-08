<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

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
            'token'      => $token,
            'token_type' => 'bearer',
            'expiry'     => Carbon::now()->addMinutes(env('JWT_TTL'))->timestamp,
            'user'       => auth()->user()
        ]);
    }

    function me()
    {
        return auth()->user();
    }
}
