<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    function listVendors()
    {
        return view('vendor.list', [
            'vendors' => Vendor::paginate(),
        ]);
    }


}
