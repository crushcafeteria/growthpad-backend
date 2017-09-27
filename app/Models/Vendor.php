<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    function products()
    {
        return $this->hasMany('App\Models\Product', 'vendor_id', 'id');
    }
}
