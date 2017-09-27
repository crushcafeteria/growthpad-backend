<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Vendor;
use App\Models\Product;

class ProductController extends Controller
{
    function viewVendor($vendorID)
    {
        return view('product.list', [
            'vendor'   => Vendor::find($vendorID),
            'products' => Product::where('vendor_id', $vendorID)->paginate(12),
        ]);
    }

    function addToCompare($productID)
    {
        if (!Session::has('comparisons')) {
            Session::put('comparisons', []);
        }

        $comparisons = Session::get('comparisons');
        $comparisons[] = $productID;

        Session::put('comparisons', $comparisons);

        return redirect()->back();
    }

    function emptyCompare()
    {
        Session::forget('comparisons');

        return redirect()->back();

    }

    function addToCart($productID)
    {

        if (!Session::has('cart')) {
            Session::put('cart', []);
        }

        $comparisons = Session::get('cart');
        $comparisons[] = $productID;

        Session::put('cart', $comparisons);

        return redirect()->back();
    }





    function search(Request $request)
    {
        $result = Product::where('vendor_id', $request->vendor)->where('name', 'LIKE', '%' . $request->q . '%')->get();
//        dd($result);
        return view('product.search-results', [
            'products' => $result,
        ]);
    }
}
