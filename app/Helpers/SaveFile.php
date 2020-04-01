<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\User;
use App\Helpers\Contracts\SaveStr;

use Storage;

class SaveFile implements SaveStr {

  public static function save(Request $request, User $user){
    $obj = new self;

    $data = $obj->checkData($request->only('name','text'));

    $str = $data['name'].' | '.$data['text'];

    Storage::prepend('str.txt',$str);
  }

  public function checkData($array){
    return $array;
  }

}

?>