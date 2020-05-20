<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{
    protected $table = 'car_details';
    protected $fillable = ['user_id', 'license', 'seat', 'color', 'branch'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
