<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserManager extends Controller
{
    function listUsers()
    {
    	return view('admin.user.list', [
    		'users' => User::paginate()
    	]);
    }
}
