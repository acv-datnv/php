<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

  protected $table = "categories";

  protected $fillable = [
      'name'
  ];

  public function post()
  {
      return $this->hasMany('App\Post', 'cat_id', 'id');
  }
  
}
