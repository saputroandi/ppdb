<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role_id', 'email', 'password','picture','session_regis',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role_id','created_at','updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function form()
    {
        return $this->hasOne(Form::class,'user_id');
    }
    public function grade()
    {
        return $this->hasOne(Grade::class,'user_id');
    }
    public function document()
    {
        return $this->hasOne(Document::class,'user_id');
    }
    public function news()
    {
        return $this->hasMany(News::class,'user_id');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class,'user_id');
    }
    public function paymentconfirmation()
    {
        return $this->hasOne(PaymentConfirmation::class,'user_id');
    }
}
