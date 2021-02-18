<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeSubmitRequest;
use App\Mail\CookbookPaymentReceived;
use App\Mail\RecipeSubmitted;
use App\Models\CookbookPurchase;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use Pesapal;

class CookbookController extends Controller
{
    function index()
    {
        // dd(app()->getLocale());
        if (!session()->has('locale')) {
            return redirect('locale/en');
        }

        $products = collect(config('cookbook.products'));

        if (request()->has('filter')) {
            $products = $products->groupBy('type');
            $products = $products[request()->filter];
        }

        //return json_encode($products, true);

        return view('cookbook.index', [
            'products' => $products
        ]);
    }

    function display($encryptedKey)
    {
        $key = decrypt($encryptedKey);
        $product = config('cookbook.products')[$key];

        if (request()->has('isCard')) {
            $iframe = $this->startPayment($product, $key);
        }

        // dd($iframe);

        return view('cookbook.view-product', [
            'product'  => $product,
            'key'      => $key,
            'purchase' => true,
            'iframe'   => @$iframe
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
            'purchases' => CookbookPurchase::with('payment')->orderBy('created_at', 'desc')->where('user_id', auth()->id())->get()
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
        $sales = CookbookPurchase::orderBy('created_at', 'desc')->paginate();
        return view('admin.cookbook.sales', [
            'sales' => $sales
        ]);
    }

    public function startPayment($product, $key)
    {
        $ref = Pesapal::random_reference();
        $payment = Payment::create([
            'processor'             => 'PESAPAL',
            'transaction_reference' => $ref,
            'transaction_timestamp' => now(),
            'amount'                => $product['price'],
            'user_id'               => auth()->id(),
            'pesapal_status'        => 'NEW',
            'product_key'           => $key
        ]);

        $details = array(
            'amount'      => $payment->amount,
            'description' => $product['name'],
            'type'        => 'MERCHANT',
            'first_name'  => explode(' ', auth()->user()->name)[0],
            'last_name'   => explode(' ', auth()->user()->name)[1],
            'email'       => auth()->user()->email,
            'phonenumber' => auth()->user()->telephone,
            'reference'   => $ref,
            'height'      => '1000px',
            'currency'    => 'KES'
        );
        $iframe = Pesapal::makePayment($details);

        return $iframe;
    }

    function showRecipeSubmitForm()
    {
        return view('cookbook.submit');
    }

    function submitRecipe(RecipeSubmitRequest $request)
    {
        Mail::to(['growthpad@irenkenya.com', 'nelson@sodium.co.ke'])->send(new RecipeSubmitted($request->all()));
        session()->flash('successbox', ['Your request has been received. Someone will be in touch soon!']);
        return redirect('submit/recipe?view=success');
    }

    function addToCart($id)
    {
        $item = config('cookbook.products')[$id];

        \ShoppingCart::add($id, $item['name'][app()->getLocale('en')], 1, $item['price'][app()->getLocale('en')]);

        return redirect('cookbook#shop');
    }

    function displayCart()
    {
//        $iframe = $this->startPayment($product, $key);
        $items = collect(\ShoppingCart::all());
        $total = 0;
        $products = null;
        $keys = null;

        if ($items->count()) {
            $items->each(function ($item) use (&$total, &$products, &$keys) {
                $total = $total + config('cookbook.products')[$item->id]['price'][app()->getLocale('en')];
                $products[] = config('cookbook.products')[$item->id]['name'][app()->getLocale('en')];
                $keys[] = $item->id;
            });
            $products = implode(' + ', $products);
            $keys = implode('|', $keys);

            $ref = Pesapal::random_reference();
            $payment = Payment::create([
                'processor'             => 'PESAPAL',
                'transaction_reference' => $ref,
                'transaction_timestamp' => now(),
                'amount'                => $total,
                'user_id'               => auth()->id(),
                'pesapal_status'        => 'NEW',
                'product_key'           => $keys
            ]);

            $details = array(
                'amount'      => $total,
                'description' => $products,
                'type'        => 'MERCHANT',
                'first_name'  => explode(' ', auth()->user()->name)[0],
                'last_name'   => explode(' ', auth()->user()->name)[1],
                'email'       => auth()->user()->email,
                'phonenumber' => auth()->user()->telephone,
                'reference'   => $ref,
                'height'      => '1000px',
                'currency'    => 'KES'
            );
            $iframe = Pesapal::makePayment($details);
        }


//        dd($iframe);

        session()->put('gTotal', $total);

        return view('cookbook.cart', [
            'items'  => \ShoppingCart::all(),
            'iframe' => @$iframe
        ]);
    }

    function removeFromCart($raw)
    {
        if ($raw == 'all') {
            \ShoppingCart::destroy();
        } else {
            \ShoppingCart::remove($raw);
        }
        return redirect()->back();
    }

    function paypalSuccess()
    {
        $txn = json_decode(request()->payload);

        //        dd($txn);

        # Record payment
        $payment = Payment::create([
            'processor'             => 'PAYPAL',
            'transaction_reference' => $txn->id,
            'transaction_timestamp' => $txn->create_time,
            'first_name'            => $txn->payer->name->given_name,
            'last_name'             => $txn->payer->name->surname,
            'amount'                => request()->total,
            'user_id'               => auth()->id(),
        ]);


        # Send email to buyer
        Mail::to(auth()->user())->send(new CookbookPaymentReceived($payment, true));

        # Record purchase
        \ShoppingCart::all()->each(function ($item) use ($payment) {
            CookbookPurchase::create([
                'user_id'     => auth()->id(),
                'product_key' => $item->id,
                'payment_id'  => $payment->id
            ]);
        });

        # Empty cart
        \ShoppingCart::destroy();

        return view('cookbook.payment-success');
    }

    function switchLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

    function mpesaSuccess($token)
    {
        $paymentID = decrypt($token);
        $payment = Payment::find($paymentID);

        if (!$payment) {
            abort(403, 'This payment is not valid. Access denied!');
        }

        if ($payment->amount != session()->get('gTotal')) {
            abort(403, 'There is a problem with your transaction. Please contact customer care for help');
        }

        # Send email to buyer
        Mail::to(auth()->user())->send(new CookbookPaymentReceived($payment, false));

        # Record purchase
        \ShoppingCart::all()->each(function ($item) use ($payment) {
            CookbookPurchase::create([
                'user_id'     => auth()->id(),
                'product_key' => $item->id,
                'payment_id'  => $payment->id
            ]);
        });

        $payment->update(['user_id' => auth()->id()]);

        # Empty cart
        \ShoppingCart::destroy();

        return view('cookbook.payment-success');
    }
}
