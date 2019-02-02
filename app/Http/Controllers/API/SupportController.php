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

        $url      = 'http://photon.komoot.de/api/?q='.request()->q.'&limit=5';
        $response = Curl::to($url)->asJson()->get();

        $suggestions = null;
        collect($response->features)->each(function($location) use (&$suggestions) {
            // dd($location);
            $suggestions[] = [
                'name' => $location->properties->name,
                'coordinates' => [
                    'lat' => $location->geometry->coordinates[0],
                    'lon' => $location->geometry->coordinates[1]
                ]
            ];
        });

        if (!$suggestions) {
            return response()->json(['error' => 'Nothing matches ' . request()->q]);
        }

        return response()->json($suggestions);
    }
}
