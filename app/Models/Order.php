<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $table = 'orders';
    protected $guarded = ['id', 'created_at'];

    protected $casts = [
        'extra_data' => 'array',
        'delivery_location' => 'array',
    ];

    function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    function ad()
    {
        return $this->hasOne(Ad::class, 'id', 'ad_id');
    }

    function logs()
    {
        return $this->hasMany(ActivityLog::class, 'order_id', 'id');
    }
}
