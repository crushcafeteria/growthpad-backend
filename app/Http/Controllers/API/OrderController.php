<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Library\SMS;
use App\Mail\OrderAccepted;
use App\Mail\OrderCompleted;
use App\Mail\OrderProgressing;
use App\Mail\OrderReceived;
use App\Mail\OrderCancelled;
use App\Mail\OrderSent;
use App\Models\Ad;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['customer', 'ad.publisher', 'logs._publisher'])
            ->where('customer_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(config('setting.page_size'));

        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!request()->ad_id) {
            return response()->json(['error' => 'Please reference a valid ad ID']);
        }

        # Deduct 1 token from SP
        $sp = Ad::find(request()->ad_id)->publisher;

        # SP must have credits to receive orders
        if ($sp->credits <= 0) {
            return response()->json(['error' => 'This service provider cannot receive your order. Please try again leter']);
        }

        $order = request()->only(['ad_id', 'instructions']);
        $order['customer_id'] = auth()->id();
        $order['sp_id'] = Ad::with('publisher')->find(request()->ad_id)->publisher->id;
        $order['extra_data'] = request()->eventOptions;
        $order['delivery_location'] = request()->deliveryLocation;
        $order['status'] = 'PENDING';

        $order = Order::create($order);

        $order = Order::with(['customer', 'ad'])->find($order->id);

        # Notify publisher via email
        Mail::to($order->ad->publisher)->send(new OrderReceived($order));

        # Notify buyer via email
        Mail::to($order->customer)->send(new OrderSent($order));

        # Notify SP of new order
        $msisdn = SMS::formatMSISDN($order->ad->publisher->telephone);
        if ($msisdn) {
            $text = config('settings.sms.templates.sp_new_order');
            $text = str_replace('{CUSTOMER}', $order->customer->name, $text);
            $text = str_replace('{PRODUCT}', $order->ad->name, $text);
            $text = str_replace('{PRICE}', number_format($order->ad->price), $text);
            @SMS::send($msisdn, $text);
        }

        # Acknowledge to customer order received
        $msisdn = SMS::formatMSISDN($order->customer->telephone);
        if ($msisdn) {
            $text = config('settings.sms.templates.customer_order_received');
            $text = str_replace('{PRODUCT}', $order->ad->name, $text);
            $text = str_replace('{PRICE}', number_format($order->ad->price), $text);
            $text = str_replace('{BUSINESS}', $order->ad->publisher->business_name, $text);
            @SMS::send($msisdn, $text);
        }

        return response()->json(['status' => 'OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->orderID);

        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'orderID'      => 'required',
            'status'       => 'required',
            'instructions' => 'required'
        ], [
            'orderID.required' => 'Please attach the orderID'
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        }

        Order::find($request->orderID)->update([
            'status'       => $request->status,
            'instructions' => $request->instructions,
        ]);

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find($request->orderID);

        if ($request->status == 'PROGRESSING') {
            Mail::to($order->customer->email)->send(new OrderProgressing($order));
        }

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function getSPOrders()
    {
        $orders = Order::with(['ad.publisher', 'customer'])
            ->where('sp_id', request()->spID)
            ->orderBy('created_at', 'DESC')
            ->paginate();

        return response()->json($orders);
    }

    function cancelOrder()
    {
        if (!request()->id || !request()->reason) {
            return response()->json(['error' => 'Please attach the required fields']);
        }

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->id);

        if (!$order) {
            return response()->json(['error' => 'This order does not exist']);
        }

        $order->update([
            'status'              => 'CANCELLED',
            'cancellation_reason' => request()->reason
        ]);

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->id);

        # Notify customer
        Mail::to($order->customer->email)->send(new OrderCancelled($order));

        # Notify customer of order cancellation via SMS
        $msisdn = SMS::formatMSISDN($order->customer->telephone);
        if ($msisdn) {
            $text = config('settings.sms.templates.customer_order_cancelled');
            $text = str_replace('{PRODUCT}', $order->ad->name, $text);
            $text = str_replace('{PRICE}', number_format($order->ad->price), $text);
            $text = str_replace('{BUSINESS}', $order->ad->publisher->business_name, $text);
            @SMS::send($msisdn, $text);
        }

        return response()->json($order);
    }

    function acceptOrder()
    {
        if (!request()->id) {
            return response()->json(['error' => 'Please attach the required fields']);
        }

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->id);

        if (!$order) {
            return response()->json(['error' => 'This order does not exist']);
        }

        $order->update([
            'status' => 'PROGRESSING'
        ]);

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->id);

        # Notify customer
        Mail::to($order->customer)->send(new OrderAccepted($order));

        # Notify publisher of order via SMS
        $msisdn = SMS::formatMSISDN($order->customer->telephone);
        if ($msisdn) {
//            @SMS::send($msisdn, 'Hello world from here');
        }

        return response()->json($order);
    }

    function completeOrder()
    {
        if (!request()->id) {
            return response()->json(['error' => 'Please attach the required fields']);
        }

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->id);

        if (!$order) {
            return response()->json(['error' => 'This order does not exist']);
        }

        $sp = $order->ad->publisher;

//        dd($sp);

        $sp->update(['credits' => ($sp->credits - config('settings.credit_values'))]);


        $order->update([
            'status' => 'COMPLETE'
        ]);

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find(request()->id);

        Mail::to($order->customer)->send(new OrderCompleted($order));

        # Notify customer of order completion via SMS
        $msisdn = SMS::formatMSISDN($order->customer->telephone);
        if ($msisdn) {
//            @SMS::send($msisdn, 'Hello world from here');
        }

        return response()->json($order);
    }
}
