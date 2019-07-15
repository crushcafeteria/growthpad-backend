<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $guarded = ['id', 'created_at'];
}
