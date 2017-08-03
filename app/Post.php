<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'title',
        'content',
        'image',
        'cat_id',
        'author_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Categories', 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function comment()
    {
      return $this->hasMany('App\Comment', 'post_id', 'id')->orderBy('created_at', 'desc');
    }
}
