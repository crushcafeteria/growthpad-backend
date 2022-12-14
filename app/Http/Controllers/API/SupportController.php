<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Library\SMS;
use App\Mail\BusinessSuggested;
use App\Models\SPSuggestions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Ixudra\Curl\Facades\Curl;

class SupportController extends Controller
{

    function countyData()
    {
        $counties = config('settings.counties');
        $data = NULL;
        collect($counties)->each(function ($value, $key) use (&$data) {
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

        $url = 'http://photon.komoot.de/api/?q=' . request()->q . '&limit=5';
        $response = Curl::to($url)->asJson()->get();

        $suggestions = NULL;
        collect($response->features)->each(function ($location) use (&$suggestions) {
            // dd($location);
            $suggestions[] = [
                'name'         => $location->properties->name,
                'display_name' => $location->properties->name,
                'coordinates'  => [
                    'lat' => $location->geometry->coordinates[0],
                    'lon' => $location->geometry->coordinates[1]
                ],
                'lat'          => $location->geometry->coordinates[0],
                'lon'          => $location->geometry->coordinates[1]
            ];
        });

        if (!$suggestions) {
            return response()->json(['error' => 'Nothing matches ' . request()->q]);
        }

        return response()->json($suggestions);
    }

    function testSMS()
    {
        $res = SMS::send('+254741504000', 'Hello world');

        return $res;
    }

    function suggestSP()
    {
        $validator = Validator::make(request()->all(), [
            'name'       => 'required',
            'telephone'  => 'required',
            'location'   => 'required',
            'extra_info' => 'required',
            'county'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }
        $row = request()->only(['name', 'telephone', 'extra_info', 'location', 'county']);
        $row['user_id'] = auth()->id();

//        dd($row);

//        $row = SPSuggestions::create($row);

        # Send email
        Mail::to(config('settings.team'))->send(new BusinessSuggested(request()));

        return response()->json($row);
    }
}
