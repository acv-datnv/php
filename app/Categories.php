<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

  protected $table = "Categories";

  public function post()
  {
      return $this->hasMany('App\Post', 'cat_id', 'id');
  }
  
}
