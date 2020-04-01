<?php

namespace App\Http\Controllers;

class CookbookController extends Controller
{
    function index()
    {
        return view('cookbook.index');
    }

    function purchase($encryptedKey)
    {
        $key = decrypt($encryptedKey);

        $product = config('cookbook.products')[$key];

        return view('cookbook.purchase', [
            'product' => $product,
            'key' => $key
        ]);
    }

    function download($key, $token)
    {
        $key = decrypt($key);
        $paymentID = decrypt($token);

        dd($key, $paymentID);
    }
}
