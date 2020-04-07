<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class CookbookPurchase extends Model
{
    protected $guarded = ['id', 'created_at'];
    protected $appends = ['product'];

    function payment()
    {
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    function getProductAttribute()
    {
        return config('cookbook.products')[$this->attributes['product_key']];
    }
}
