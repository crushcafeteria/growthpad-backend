<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';
    protected $guarded = ['id', 'created_at'];

    function topic()
    {
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }
}
