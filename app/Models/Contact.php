<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    protected $guarded = ['id', 'created_at'];

    protected $casts = [
        'contact_telephone' => 'array',
        'email'             => 'array',
        'products'          => 'array',
    ];

    function getPictureAttribute($value)
    {
        if ($value) {
            $value = asset('storage') . '/' . $value;
        }

        return $value;
    }
}
