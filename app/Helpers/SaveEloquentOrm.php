<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\User;
use App\Helpers\Contracts\SaveStr;

class SaveEloquentOrm implements SaveStr {

  public static function save(Request $request, User $user){
    $obj = new self;

    $data = $obj->checkData($request->only('name','text'));
    
    $user->articles()->create($data);
  }

  public function checkData($array){
    return $array;
  }

}

?>