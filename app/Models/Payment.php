<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $guarded = ['id', 'created_at'];
    protected $appends = ['full_names'];

    function getFullNamesAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
