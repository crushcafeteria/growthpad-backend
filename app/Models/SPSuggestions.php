<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPSuggestions extends Model
{
    protected $table = 'sp_suggestions';

    protected $guarded = ['id', 'created_at'];
}
