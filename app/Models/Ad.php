<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $table = 'ads';
    protected $guarded = ['id', 'created_at'];
    protected $casts = [
        'pictures' => 'array'
    ];

    protected $appends = ['featured_picture'];

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
}
