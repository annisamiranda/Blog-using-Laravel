<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'user';
    protected $fillable = ['user_name', 'user_email'];
}
