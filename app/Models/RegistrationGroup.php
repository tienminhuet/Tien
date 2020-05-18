<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RegistrationGroup extends Model
{
    protected $table = 'registration_groups';

    protected $fillable = ['name', 'number_days'];

    public function user()
    {
        return $this->hasMany(User::class, 'registration_id', 'id');
    }
}
