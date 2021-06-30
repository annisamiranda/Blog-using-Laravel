<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = 'article';
    protected $fillable = ['article_title', 'article_content', 'article_img', 'article_date'];

    public function author(){
        return $this->belongsTo('App\author', 'author_id');
    }

    public function category(){
        return $this->belongsTo('App\kategori', 'category_id');
    }

    public function tag(){
        return $this->hasMany('App/tag');
    }

    public function articleComment(){
        return $this->belongsToMany('App\User', 'comment', 'article_id', 'user_id', 'comment_id');
    }
    protected $fillable = ['article_title', 'article_content', 'article_img', 'article_date', 'author_id', 'category_id', 'tag_id'];
}
