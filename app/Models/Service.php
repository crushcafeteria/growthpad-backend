<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $guarded = ['id', 'created_at'];

    protected $casts = [
        'products' => 'array',
    ];

    public function getPictureAttribute($value)
    {
        if (!$value) {
            $random = collect(json_decode(Storage::get('random-images.json'), true))->random()['id'];
            $value = 'https://unsplash.it/800/600?image=' . $random;
        } else {
            $value = asset('storage').'/'.$value;
        }

        return $value;
    }
}
