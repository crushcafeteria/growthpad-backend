<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class STKPush extends Controller
{
    function test()
    {
        $mpesa = new \Safaricom\Mpesa\Mpesa();

        $data = [
            'shortcode' => config('settings.mpesa.shortcode'),
            'passkey'   => config('settings.mpesa.lnmpasskey'),
            'type'      => 'CustomerPayBillOnline',


        ];

        $stkPushSimulation = $mpesa->STKPushSimulation($data['shortcode'], $data['passkey'], $data['type'],
            1, '254706266712', '174379', '254706266712',
            $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
    }
}
