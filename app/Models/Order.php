<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    protected $guarded = ['id', 'created_at'];

    function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    function ad()
    {
        return $this->hasOne(Ad::class, 'id', 'ad_id');
    }
}
