<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'category';
    protected $fillable = ['category_name'];

    public function category(){
        return $this->hasMany('App/artikel');
    }
}
