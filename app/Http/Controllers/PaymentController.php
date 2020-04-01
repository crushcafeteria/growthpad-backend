<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceived;
use App\Mail\PaymentConfirmed;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    function ipn($password)
    {
        $raw = file_get_contents('php://input');
        Log::info('MPESA IPN => ', ['payment' => $raw]);

    	# Validate request password
        if($password != '2347236767') {
            return response()->json(['error' => 'Service unavailable']);
        }

    	# Save txn
    	$row = request()->only([
			'transaction_reference', 'transaction_timestamp', 'sender_phone', 'first_name', 
			'middle_name', 'last_name', 'amount'
		]);
		$payment = Payment::create($row);

		# Notify staff
		Mail::to(config('settings.team')[0]['email'])->send(new PaymentReceived($payment));
		// Mail::to('nelson@lipasafe.com')->send(new PaymentReceived($payment));

		return response()->json([
            'status' => '01',
            'description' => 'Accepted'
        ]);
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

    function detectPayment($code = null)
    {
        # Format number
        if(!auth()->check()){
            $telephone = request()->msisdn;
        } else {
            $telephone = auth()->user()->telephone;
        }

        if(substr($telephone, 0, 2) == '07') {
            $telephone = '+254'.(int)$telephone;
        }
        
        $payments = (!$code) ? Payment::where('sender_phone', $telephone) : Payment::where('transaction_reference', $code);
        $payments = $payments->whereNull('user_id');

        if (!$payments->count()) {
            return response()->json([
                'status' => 'FAILED',
                'error' => 'This MPESA code is not valid. Please check your MPESA SMS'
            ]);
        }

        $payment = $payments->first();

        return response()->json([
            'status'  => 'OK',
            'payments' => $payment,
            'token' => encrypt($payment->id)
        ]);
    }

    function applyPayment($id)
    {
        $payment = Payment::find($id);

        if(!$payment){
            return response()->json([
                'status' => 'FAILED',
                'error' => 'Invalid transaction code'
            ]);
        }

        // dd($payment);


        $payment->update(['user_id' => auth()->user()->id]);
        auth()->user()->update([
            'credits' => (auth()->user()->credits + $payment->amount)
        ]);

        # Send SP an email
        Mail::to(auth()->user()->email)->send(new PaymentConfirmed($payment));

        return response()->json([
            'status' => 'OK',
            'profile' => auth()->user()
        ]);
    }
}
