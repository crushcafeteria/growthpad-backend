<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderProgressing;
use App\Models\ActivityLog;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.list', [
            'orders' => Order::with(['customer', 'ad'])->paginate(config('settings.page_size'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        return view('orders.show', [
            'order' => Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find($id)
        ]);
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
        return view('orders.edit', [
            'order' => Order::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        Order::find($id)->update([
            'status'       => $request->status,
            'instructions' => $request->instructions,
        ]);

        $order = Order::with(['customer', 'ad.publisher', 'logs._publisher'])->find($id);

        if($request->status == 'PROGRESSING'){
            Mail::to($order->customer->email)->send(new OrderProgressing($order));
        }


        request()->session()->flash('successbox', ['This order has been updated!']);

        return redirect(route('orders.show', ['order' => $id]));
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
        $order = Order::findOrFail($id);
        request()->session()->flash('successbox', ['Order successfully deleted']);

        return redirect()->route('orders.index');
    }

    function saveNote($orderID)
    {
        if (!request()->note) {
            request()->session()->flash('errorbox', ['You cannot save an empty staff note']);

            return redirect(route('orders.show', ['id' => $orderID]));
        }

        ActivityLog::create([
            'publisher' => auth()->id(),
            'order_id'  => $orderID,
            'message'   => request()->note
        ]);

        request()->session()->flash('successbox', ['You have successfully added a note to this order']);

        return redirect(route('orders.show', ['id' => $orderID]));
    }

    function makePDF($id)
    {
        $pdf = PDF::loadView('pdfs.order');

        return $pdf->stream('Order ' . $id . '.pdf');

    }

    function search()
    {
        if (!request()->q) {
            session()->flash('errorbox', ['Please enter a search term']);

            return redirect()->route('orders.index');
        }

        $q      = '%' . request()->q . '%';
        $orders = Order::with(['customer', 'ad'])->whereHas('ad', function ($query) use ($q){
            $query->where('name', 'LIKE', $q)->orWhere('description', 'LIKE', $q);
        })->paginate(config('settings.page_size'));

        return view('orders.list', [
            'orders' => $orders
        ]);
    }
}
