<?php

namespace App;

use App\Models\CarDetail;
use App\Models\Coordinate;
use App\Models\RegistrationGroup;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'occupations', 'role', 'home_address', 'company_address', 'start_time', 'end_time', 'smoking'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function coordinate() {
        return $this->hasOne(Coordinate::class, 'user_id', 'id');
    }

    public function group() {
        return $this->belongsTo(\App\Models\Group::class, 'group_id', 'id');
    }

    public function registration() {
        return $this->belongsTo(RegistrationGroup::class, 'registration_id', 'id');
    }

    public function carDetail() {
        return $this->hasOne(CarDetail::class, 'user_id', 'id');
    }
}
