<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $table = 'author';
    protected $fillable = ['author_name', 'author_email', 'author_password', 'bio', 'author_ava'];

    public function artikel(){
        return $this->hasMany('App/artikel');
    }
}
