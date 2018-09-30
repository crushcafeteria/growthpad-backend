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

    function getPicturesAttribute($pics)
    {
        $pics = json_decode($pics, true);

        collect($pics)->each(function ($pic, $key) use (&$pics){
            $pics[$key] = asset('storage/' . $pic);
        });

        return $pics;
    }

    function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }

    function getFeaturedPictureAttribute()
    {
        return asset('storage/' . collect(json_decode($this->attributes['pictures']))->first());
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
