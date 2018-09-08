<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class SupportController extends Controller
{

    function countyData()
    {
        $counties = config('settings.counties');
        $data     = null;
        collect($counties)->each(function ($value, $key) use (&$data){
            $data[] = [
                'key'   => $key,
                'value' => $value
            ];
        });

        return response()->json($data);
    }

    function suggestLocation()
    {
        if (!request()->q) {
            return response()->json(['error' => 'Please enter a search term']);
        }

        $url      = 'https://nominatim.openstreetmap.org/search?format=json&q=' . request()->q . '&country=ke&email=nelson@lipasafe.com';
        $response = Curl::to($url)->asJson()->get();

        $suggestions = null;

        dd($response);

//        if (count($response)) {
//            return response()->json($response);
//        } else {
//            return response()->json(['error' => 'Nothing matches ' . request()->q]);
//        }
    }
}
