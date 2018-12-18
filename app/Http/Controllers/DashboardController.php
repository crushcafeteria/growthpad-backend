<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard', [
            'total'     => [
                'accounts' => User::count(),
                'orders'   => Order::count(),
                'ads'      => Ad::count(),
            ],
            'latestAds' => Ad::orderBy('created_at', 'DESC')->get()->take(10)
        ]);
    }
}
