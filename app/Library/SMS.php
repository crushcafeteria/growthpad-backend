<?php
/*
 * This class sends an SMS message via AfricasTalking API
 *
 * */

namespace App\Library;

use AfricasTalking\SDK\AfricasTalking;
use AfricasTalkingGatewayException;

class SMS
{

    public static function send($msisdn, $msg)
    {
        $username = config('settings.sms.username');
        $apiKey = config('settings.sms.api_key');
        $alnum = config('settings.sms.alphanumeric');


        $gateway = new AfricasTalking($username, $apiKey);
        $service = $gateway->sms();
        $response = $service->send([
//            'from'    => $alnum,
            'to'      => $msisdn,
            'message' => $msg
        ]);

        return $response;
    }

    static function formatMSISDN($number)
    {
        # Convert to intl format
        $number = '+254' . (int)$number;

        # Validate telephone
        if (strlen($number) != 13 || substr($number, 0, 5) != '+2547') {
            return false;
        }

        return $number;
    }

}