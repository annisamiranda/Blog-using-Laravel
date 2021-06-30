<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['tag_name'];

    public function artikel(){
        return $this->belongsTo('App\artikel', 'article_id');
    }
}
