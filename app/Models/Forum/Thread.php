<?php

namespace App\Models\Forum;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Thread extends Model
{
    protected $table = 'threads';
    protected $guarded = ['id', 'created_at'];
    protected $appends = ['friendly_time','liked'];

    function topic()
    {
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }

    function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    function getFriendlyTimeAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    function likes()
    {
        return $this->hasMany(Like::class, 'target_id', 'id');
    }

    function getLikedAttribute()
    {
        $likes = Like::where('target_id', $this->attributes['id'])
            ->where('type','THREAD')
            ->where('author_id', auth()->id())
            ->count();

        return ($likes) ? true : false;
    }
}
