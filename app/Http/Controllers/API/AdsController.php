<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
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
        $ads = Ad::with('publisher')->where('category', request()->category)->paginate(config('settings.page_size'));

        return response()->json($ads);
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
        $payload = json_decode($request->payload);

        $validator = Validator::make(request()->all(), [
            'payload' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        # Upload pictures
        collect($payload->pictures)->each(function ($picture){
            dump($picture);
        });

//        $ad                 = request()->only([
//            'category',
//            'name',
//            'description',
//            'price',
//            'telephone',
//            'email',
//            'location',
//            'picture'
//        ]);
//        $ad['expiry']       = Carbon::now()->addMonths(12);
//        $ad['publisher_id'] = auth()->id();
//
//        $ad = Ad::create($ad);
//
//        Mail::to(auth()->user())->send(new AdCreated($ad));
//
//        return response()->json($ad);
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
        $ad = Ad::with('publisher')->find($id);

        return response()->json($ad);
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
    public function update(Request $request, $id)
    {
        //
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

    function nearBy()
    {
        $latitude  = auth()->user()->lat;
        $longitude = auth()->user()->lon;
        $distance  = request()->kilometres;

        $nearByAds = Ad::whereRaw(
            DB::raw("(6367 * acos( cos( radians($latitude) ) * cos( radians( lat ) )  * 
                          cos( radians( lon ) - radians($longitude) ) + sin( radians($latitude) ) * sin( 
                          radians( lat ) ) ) ) < $distance ")
        )->paginate();

        return response()->json($nearByAds);
    }

    function search()
    {
        $q = '%' . request()->q . '%';

        $results = Ad::with('publisher')
                     ->where('name', 'LIKE', $q)
                     ->orWhere('description', 'LIKE', $q)->paginate();

        return response()->json($results);
    }

    function getSPAds()
    {
        $ads = Ad::with('publisher')->where('publisher_id', request()->spID)->get();

        return response()->json($ads);
    }


}
