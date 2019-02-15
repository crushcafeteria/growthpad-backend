<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SendFeedbackMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $user = request()->only([
            'name',
            'email',
            'telephone',
            'gender',
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
        auth()->user()->update(['location' => json_decode(request()->location)]);

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
            'telephone' => 'required',
            'gender'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        $profile = request()->only(['name', 'email', 'telephone', 'gender']);
        User::find(auth()->id())->update($profile);

        return response()->json(User::find(auth()->id()));
    }

    function getSPs()
    {
        $latitude  = auth()->user()->lat;
        $longitude = auth()->user()->lon;
        $distance  = request()->radius;

        $SPs = User::with('ads')->where('privilege', 'SP')->whereRaw(
            DB::raw("(6367 * acos( cos( radians($latitude) ) * cos( radians( lat ) )  *
                          cos( radians( lon ) - radians($longitude) ) + sin( radians($latitude) ) * sin(
                          radians( lat ) ) ) ) < $distance ")
        )->whereHas('ads', function ($query){
            return $query->where('category', request()->category);
        })->paginate();


        return response()->json($SPs);
    }

    function sendFeedback(Request $request)
    {
        # Validate request
        $validator = Validator::make(request()->all(), [
            'names'     => 'required',
            'telephone' => 'required',
            'email'     => 'required|email',
            'message'   => 'required'
        ], [
            'names.required'     => 'Please enter your name',
            'telephone.required' => 'Please enter your telephone',
            'email.required'     => 'Please enter your email address',
            'email.email'        => 'This email is not valid',
            'message.required'   => 'Please enter your message',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()->first()
            ]);
        }

        # Send email to admin
        Mail::to(config('settings.team')[0]['email'])->send(new SendFeedbackMessage(request()));

        return response()->json(['status' => 'OK']);
    }

    function ping($user = null)
    {
        if($user){
            $user = User::find($user);
            return response()->json([
                'status' => 'ALIVE', 
                'profile' => auth()->user
            ]);
        } else {
            return response()->json('ALIVE');
        }

    }
}
