<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $guarded = ['id', 'created_at'];
}
