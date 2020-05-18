<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['group'];

    public function user()
    {
        return $this->hasMany(User::class, 'group_id', 'id');
    }
}
