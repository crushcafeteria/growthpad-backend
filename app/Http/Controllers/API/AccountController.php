<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
            'user'  => auth()->user(),
            'token' => [
                'value'  => $token,
                'type'   => 'bearer',
                'expiry' => Carbon::now()->addMinutes(env('JWT_TTL'))->timestamp,
            ]
        ]);
    }

    function me()
    {
        return auth()->user();
    }

    function signup()
    {
        $user      = request()->only([
            'name',
            'email',
            'telephone',
            'gender',
            'county',
            'password'
        ]);
        $validator = Validator::make($user, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'telephone' => 'required|unique:users',
            'gender'    => 'required',
            'password'  => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        # Create new user
        $user['password']  = bcrypt($user['password']);
        $user['privilege'] = 'USER';
        $user              = User::create($user);

        # Login user
        $token = JWTAuth::attempt(request()->only(['email', 'password']));

        return response()->json([
            'user'  => $user,
            'token' => [
                'value'  => $token,
                'type'   => 'bearer',
                'expiry' => config('jwt.ttl'),
            ],
        ]);
    }

    function updateLocation()
    {
        auth()->user()->update(['location' => request()->location]);

        return response()->json([
            'status' => 'OK',
            'user'   => auth()->user()
        ]);
    }

    function uploadPicture()
    {
        $uri = request()->dataURI;

        if (strlen($uri) > 128) {
            list($ext, $data) = explode(';', $uri);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            $file = 'profile_pictures/' . md5(str_random(15)) . '.jpg';
            Storage::disk('public')->put($file, $data);

            auth()->user()->update([
                'picture' => $file
            ]);

            return response()->json([
                'status'  => 'OK',
                'profile' => User::find(auth()->id())
            ]);
        } else {
            return response()->json(['error' => 'This picture is corrupted']);
        }
    }

    function updateProfile()
    {
        $validator = Validator::make(request()->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'telephone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        $profile = request()->only(['name', 'email', 'telephone']);
        User::find(auth()->id())->update($profile);

        return response()->json(User::find(auth()->id()));
    }
}
