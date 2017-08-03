<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }
}
