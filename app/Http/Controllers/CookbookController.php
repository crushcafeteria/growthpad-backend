<?php

namespace App\Http\Controllers;

use App\Mail\CookbookPaymentReceived;
use App\Models\CookbookPurchase;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;

class CookbookController extends Controller
{
    function index()
    {
        return view('cookbook.index');
    }

    function display($encryptedKey)
    {
        $key = decrypt($encryptedKey);

        $product = config('cookbook.products')[$key];

        return view('cookbook.purchase', [
            'product'  => $product,
            'key'      => $key,
            'purchase' => true
        ]);
    }

    function purchase($encryptedKey)
    {
        $key = decrypt($encryptedKey);

        $product = config('cookbook.products')[$key];

        # Check if book is purchased
        $purchase = CookbookPurchase::where('user_id', auth()->id())->where('product_key', $key);
        if ($purchase->count()) {
            return redirect('cookbook/my-purchases');
        }

        return view('cookbook.purchase', [
            'product' => $product,
            'key'     => $key
        ]);
    }

    function activatePurchase($key, $token)
    {
        $key = decrypt($key);
        $paymentID = decrypt($token);

        $product = config('cookbook.products')[$key];
        $payment = Payment::find($paymentID);

        if ($payment->amount != $product['price']) {
            abort(403, 'There is a problem with your transaction. Please contact customer support for help');
        }

        # Send receipt
        Mail::to(auth()->user())->send(new CookbookPaymentReceived($payment));

        # record purchase
        CookbookPurchase::create([
            'user_id'     => auth()->id(),
            'product_key' => $key,
            'payment_id'  => $paymentID
        ]);

        $payment->update(['user_id' => auth()->user()->id]);

        return redirect('/cookbook/my-purchases');
    }

    function myPurchases()
    {
        return view('cookbook.my-purchases', [
            'purchases' => CookbookPurchase::with('payment')->where('user_id', auth()->id())->get()
        ]);
    }

    function download($purchaseID)
    {
        $purchase = CookbookPurchase::find($purchaseID);

        if (auth()->id() != $purchase->user_id) {
            abort(403, 'You do not have the privileges to access this resource');
        }

        $product = config('cookbook.products')[$purchase['product_key']];
        $file = storage_path() . '/app/' . $product['file'];

        $filetype = filetype($file);
        $filename = basename($file);
        header("Content-Type: " . $filetype);
        header("Content-Length: " . filesize($file));
        header("Content-Disposition: attachment; filename=" . $filename);
        readfile($file);
    }

    function showSales()
    {
        $sales = CookbookPurchase::paginate();
        return view('admin.cookbook.sales', [
            'sales' => $sales
        ]);
    }
}
