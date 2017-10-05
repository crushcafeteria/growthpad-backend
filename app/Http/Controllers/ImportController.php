<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Excel;

class ImportController extends Controller
{
    function __invoke()
    {
        $file = storage_path('app/data/data.xls');

        $data = [];
        Excel::load($file, function ($reader) use (&$data, &$fields) {
            $reader->each(function ($row) use (&$data, &$fields) {
                $data[] = $this->format($row);
            });
        });

        # Save files to DB
        collect($data)->each(function ($row) {
            Contact::create($row);
        });


        echo '<h4>Import complete!</h4>';

    }

    private function format($row)
    {
        $tmp = [
            'name'              => $row['business_name'],
            'location'          => $row['location'],
            'contact_name'      => $row['contact_person'],
            'contact_telephone' => explode(',', '0' . (integer)$row['contact']),
            'county'            => strtoupper($row['county']),
            'email'             => ($row['email'] == 'n/a') ? NULL : explode(',', $row['email']),
            'positioning'       => $row['position_in_the_agribusiness_value_chain'],
        ];

        return $tmp;
    }
}
