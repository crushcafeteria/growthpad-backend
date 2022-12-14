<?php

namespace App\Models;

use Geokit\LatLng;
use Geokit\Math;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{

     use SoftDeletes;

    protected $table = 'ads';
    protected $guarded = ['id', 'created_at'];
    protected $casts = [
        'pictures' => 'array',
        'location' => 'array',
    ];

    protected $dates = ['deleted_at'];

    protected $appends = ['featured_picture', 'distance'];

    function getPicturesAttribute($pics)
    {
        if (!$pics) {
            return ['http://placehold.it/400x300?text=Image coming soon'];
        } else {
            $pics = json_decode($pics, true);

            collect($pics)->each(function ($pic, $key) use (&$pics){
                # Do not send SSL links for API because it uses IP to access server. IP has no SSL cert
                $pics[$key] = asset('storage/' . $pic, (request()->wantsJson() ? false : env('FORCE_SSL')));
            });

            return $pics;
        }
    }

    function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }

    function getFeaturedPictureAttribute()
    {
        if (!$this->attributes['pictures']) {
            return 'http://placehold.it/200x200?text=Image coming soon';
        } else {
            return asset('storage/' . json_decode($this->attributes['pictures'], true)[0]);
        }
    }

    function getDistanceAttribute()
    {
        $math = new Math();

        $from = @new LatLng(auth()->user()->lat, auth()->user()->lon);
        $to   = new LatLng($this->attributes['lat'], $this->attributes['lon']);

        $distance = $math->distanceVincenty($from, $to);

        return round($distance->kilometers(), 1);
    }

    function orders()
    {
        return $this->hasMany(Order::class, 'ad_id', 'id');
    }
}
