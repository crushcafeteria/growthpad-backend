<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Order;
use App\Models\Payment;
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
            'total'  => [
                'accounts'         => User::count(),
                'orders'           => [
                    'total'       => Order::count(),
                    'pending'     => Order::where('status', 'PENDING')->count(),
                    'progressing' => Order::where('status', 'PROGRESSING')->count(),
                    'completed'   => Order::where('status', 'COMPLETED')->count(),
                ],
                'ads'              => Ad::count(),
                'total_transacted' => $this->getTotalTransacted(),
                'SPs'              => User::where('privilege', 'SP')->count(),
                'customers'        => User::where('privilege', 'USER')->count()

            ],
            'orders' => Order::orderBy('created_at', 'DESC')->get()->take(10),
        ]);
    }

    function getTotalTransacted()
    {
        $total = Payment::sum('amount');
        return $total;
    }
}
