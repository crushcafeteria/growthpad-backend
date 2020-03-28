<?php

namespace App\Models\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $guarded = ['id', 'created_at'];

    function threads()
    {
        return $this->hasMany(Thread::class, 'topic_id', 'id');
    }

    function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
