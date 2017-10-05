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
        Contact::insert($data);


        echo '<h4>Import complete!</h4>';

    }

    private function format($row)
    {
        $tmp = [
            'name'              => $row['business_name'],
            'location'          => $row['location'],
            'contact_name'      => $row['contact_person'],
            'contact_telephone' => '0' . (integer)$row['contact'],
            'county'            => $row['county'],
            'email'             => ($row['email'] == 'n/a') ? NULL : $row['email'],
            'positioning'       => $row['position_in_the_agribusiness_value_chain'],
        ];

        return $tmp;
    }
}
