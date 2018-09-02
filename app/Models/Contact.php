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

    public function getPictureAttribute($value)
    {
        if ($value) {
            $value = asset('storage') . '/' . $value;
        }

        return $value;
    }

    public static function isValid($row)
    {
        $valid = true;

        if (!$row->name) {
            $valid = false;
        }

        return $valid;
    }
}
