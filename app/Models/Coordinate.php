<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $table = 'coordinates';

    protected $fillable = ['user_id', 'latH', 'lngH', 'latC', 'lngC'];
    /**
     * @var int
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
