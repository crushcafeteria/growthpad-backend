<?php

namespace App\Models;

use Geokit\LatLng;
use Geokit\Math;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{

    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'location' => 'array'
    ];

    protected $appends = ['distance'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    function getPictureAttribute($val)
    {
        if (!$val) {
//            return 'http://placehold.it/300?Image coming soon';
            return null;
        } else {
            return asset('storage/' . $val);
        }
    }

    function getDistanceAttribute()
    {
        $math = new Math();

        $from = @new LatLng(auth()->user()->lat, auth()->user()->lon);
        $to = @new LatLng($this->attributes['lat'], $this->attributes['lon']);

        $distance = $math->distanceVincenty($from, $to);

        return round($distance->kilometers(), 1);
    }

    function ads()
    {
        return $this->hasMany(Ad::class, 'publisher_id', 'id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
