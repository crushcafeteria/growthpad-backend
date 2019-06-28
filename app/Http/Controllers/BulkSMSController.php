<?php

namespace App\Http\Controllers;

use App\Jobs\SendBulkSMS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BulkSMSController extends Controller
{
    function index()
    {
        return view('bulk-sms.index');
    }

    function sendMessages()
    {
        $validation = Validator::make(request()->all(), [
            'group'   => 'required',
            'message' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }

        # Get recipients
        if (request()->group == 'PROVIDERS') {
            $users = User::where('privilege', 'SP')->get();
        } else if (request()->group == 'PROVIDERS') {
            $users = User::where('privilege', 'USER')->get();
        } else {
            $users = User::get();
        }

        $recipients = NULL;
        $users->each(function ($user) use (&$recipients) {
            $tmp = (int)$user->telephone;
            if (strlen($tmp) == 9) {
                $recipients[] = '+254' . $tmp;
            }
        });

        # Send in manageable chunks
        collect($recipients)->chunk(100)->each(function ($numberList) {
            $numberList = implode(',', $numberList->toArray());

            # Dispatch bulk SMSes
            SendBulkSMS::dispatchNow($numberList, request()->message);
//            dd($numberList);
        });

//        dd($recipients);
    }
}
