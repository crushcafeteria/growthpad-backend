<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

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
}
