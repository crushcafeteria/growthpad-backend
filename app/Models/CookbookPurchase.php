<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class CookbookPurchase extends Model
{
    protected $guarded = ['id', 'created_at'];

    function payment()
    {
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }
}
