<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('provider')) {
            $ads = Ad::with(['publisher'])->where('publisher_id', request()->provider);
        } else {
            $ads = Ad::with(['publisher']);
        }

        return view('ads.list', [
            'ads'      => $ads->paginate(config('settings.page_size')),
            'provider' => (request()->has('provider')) ? User::find(request()->provider) : null
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
        return view('ads.show', [
            'ad' => Ad::with('publisher')->find($id)
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
        return view('ads.edit', [
            'ad' => Ad::find($id)
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
    public function update(AdRequest $request, $id)
    {
        Ad::find($id)->update($request->only([
            'name',
            'category',
            'price',
            'telephone',
            'email',
            'location',
            'description'
        ]));

        session()->flash('successbox', ['You have successfully updated this ad']);

        return redirect(route('ads.show', ['ad' => $id]));
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
        $ad = Ad::findOrFail($id);

        # Remove all orders related to this ad
        Order::where('ad_id', $id)->delete();

        $ad->delete();
        request()->session()->flash('successbox', ['Advertisement successfully deleted']);

        return redirect()->route('ads.index');
    }
}
