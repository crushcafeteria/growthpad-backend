<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\OrderProgressing;
use App\Mail\OrderReceived;
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
        $orders = Order::with(['customer', 'ad.publisher'])->paginate(config('setting.page_size'));

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

        $order                = request()->only(['ad_id', 'instructions']);
        $order['customer_id'] = auth()->id();

        $order = Order::create($order);

        $order = Order::with(['customer', 'ad'])->find($order->id);

        # Notify publisher via email
//        Mail::to($order->ad->publisher)->send(new OrderReceived($order));
        Mail::to('nelson@lipasafe.com')->send(new OrderReceived($order));

        # Notify buyer via email
        return response()->json(['status' => 'OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'orderID.required' => 'Please atatch the orderID'
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
}
