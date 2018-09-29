<?php

namespace App\Models;

use Geokit\LatLng;
use Geokit\Math;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $table = 'ads';
    protected $guarded = ['id', 'created_at'];
    protected $casts = [
        'pictures' => 'array',
        'location' => 'array',
    ];

    protected $appends = ['featured_picture', 'distance'];

//    function getPictureAttribute($pic)
//    {
//        if (!$pic) {
//            return 'https://source.unsplash.com/random/500x500?rand=' . rand(0, 10000);
//        }
//        return $pic;
//    }

    function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }

    function getFeaturedPictureAttribute()
    {
        return collect(json_decode($this->attributes['pictures']))->first();
    }

    function getDistanceAttribute()
    {
        $math = new Math();

        $from = @new LatLng(auth()->user()->lat, auth()->user()->lon);
        $to   = new LatLng($this->attributes['lat'], $this->attributes['lon']);

        $distance = $math->distanceVincenty($from, $to);

        return round($distance->kilometers(), 1);
    }
}
