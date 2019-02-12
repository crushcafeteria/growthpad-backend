<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceived;

class PaymentController extends Controller
{
    function ipn($password)
    {
    	# Validate request password
    	if($password != env('KOPO_REQUEST_PASS')) {
    		return response()->json(['error' => 'Service unavailable']);
    	}

    	# Save txn
    	$row = request()->only([
			'transaction_reference', 'transaction_timestamp', 'sender_phone', 'first_name', 
			'middle_name', 'last_name', 'amount'
		]);
		$payment = Payment::create($row);

		# Notify staff
		// Mail::to(config('settings.team')[0]['email'])->send(new PaymentReceived($payment));
		Mail::to('nelson@lipasafe.com')->send(new PaymentReceived($payment));

		return response()->json($payment);
    }

    public function list(Request $request)
    {
        if ($request->q) {
            $q = '%' . $request->q . '%';
            $payments = Payment::where('transaction_reference', 'LIKE', $q)
                ->orWHere('first_name', 'LIKE', $q)
                ->orWHere('last_name', 'LIKE', $q)
                ->orWHere('amount', 'LIKE', $q)
                ->paginate(config('settings.page_size'));
        } else {
            $payments = Payment::orderBy('created_at', 'DESC')->paginate(config('settings.page_size'));
        }
        return view('payment.index', [
            'payments' => $payments
        ]);
    }

    function queryPayment($type, $q=null)
    {
        if ($type == 'msisdn') {
            $payments = Payment::where('sender_phone', 'LIKE', '%' . $q . '%')->where('status', 'PENDING');
        } else if ($type == 'code') {
            $payments = Payment::where('transaction_reference', $q)->where('status', 'PENDING');
        }


        if (!$payments->count()) {
            return response()->json([
                'status' => 'FAILED'
            ]);
        }

        return response()->json([
            'status'  => 'OK',
            'payments' => $payments->get()
        ]);
    }

    function redeemPayment($code)
    {
        $payment = Payment::where('transaction_reference', $code)->first();

        if(!$payment){
            return response()->json([
                'status' => 'FAILED',
                'error' => 'Invalid transaction code'
            ]);
        }

        if($payment->status != 'PENDING'){
            return response()->json([
                'status' => 'FAILED',
                'error' => 'Payment already redeemed'
            ]);
        }

        $payment->update(['status'=>'USED']);

        return response()->json(['status'=>'OK']);

    }
}
