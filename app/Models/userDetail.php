<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birth_date',
        'is_active',
    ];
}
