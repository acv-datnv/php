<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "Posts";

    public function category()
    {
        return $this->belongsTo('App\Categories', 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
