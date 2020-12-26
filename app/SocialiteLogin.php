<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialiteLogin extends Model
{
    protected $fillable = [
        'email', 'name'
    ];
}
