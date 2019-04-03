<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Ad;
use App\Models\Order;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = ($_GET['q']) ? User::where('name', 'LIKE', '%' . $_GET['q'] . '%')->orWhere('name', 'LIKE', '%' . $_GET['q'] . '%')->paginate() : User::paginate();
        return view('users.list', [
            'accounts' => $accounts
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
        return view('users.show', [
            'account' => User::find($id)
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
        return view('users.edit', [
            'account' => User::find($id)
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
    public function update(UserRequest $request, $id)
    {
        User::find($id)->update($request->only(['name', 'email', 'telephone', 'privilege', 'gender', 'credits', 'county', 'business_name']));

        $request->session()->flash('successbox', ['User account successfully updated']);

        return redirect()->route('users.show', ['id' => $id]);
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
        $user = User::findOrFail($id);

        # Delete user ads and orders
        $ads = Ad::where('publisher_id', $id)->get();
        $ads->each(function ($ad) {
            Order::where('ad_id', $ad->id)->delete();
        });

        $user->delete();

        request()->session()->flash('successbox', ['User account successfully deleted']);

        return redirect()->route('users.index');
    }
}
