<?php

namespace App\Http\Controllers;

use App\Mail\SendEnquiryNotification;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    function showServices()
    {
        return view('service.list', [
            'services' => Service::paginate(),
        ]);
    }

    function addToCart($serviceID)
    {

        if (!Session::has('cart')) {
            Session::put('cart', []);
        }

        $comparisons = Session::get('cart');
        $comparisons[] = $serviceID;

        Session::put('cart', $comparisons);

        Session::flash('successbox', ['One item has been added to the basket']);

        return redirect()->back();
    }

    function basket()
    {
        $cart = NULL;

        if (count(Session::get('cart'))) {
            collect(Session::get('cart'))->each(function ($serviceID) use (&$cart) {
                $cart[] = Service::find($serviceID);
            });
        }

//        dd($cart);

        return view('basket', [
            'cart' => $cart,
        ]);
    }

    function removeFromCart($productID)
    {
        if (count(Session::get('cart')) == 1) {
            Session::forget('cart');
        } else {
            $newCart = collect(Session::get('cart'))->flatten()->except($productID);
            Session::put('cart', $newCart);
        }

        return redirect()->back();
    }

    function loadEnquiry($type)
    {
        return view('service.forms.' . $type);
    }

    function saveEnquiry(Request $request)
    {
//        dump($request->all());

        # Save enquiry
        $order = ServiceOrder::create($request->all());

        # Send email to admins
        Mail::to(collect(config('settings.team')))->send(new SendEnquiryNotification($order));

        return Response::json(['status' => 'OK']);
    }

    function showDisclaimer()
    {
        return view('service.disclaimer');
    }
}
