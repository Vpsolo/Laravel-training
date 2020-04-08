<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function artiles(){
    return $this->hasMany('Corp\Articles');
  }
}
