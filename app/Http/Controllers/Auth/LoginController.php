<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->messages()]);
        }

        $valid = Auth::attempt($request->all());

        if($valid){
            $user = User::where('email', $request->email)->first()->toArray();
            return response()->json($user);
        } else {
            return response()->json(['error'=>'Invalid credentials!']);
        }
    }

}
