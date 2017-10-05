<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = ['id', 'created_at'];


    function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }

}
