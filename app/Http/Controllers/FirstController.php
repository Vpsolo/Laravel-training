<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class FirstController extends Controller{
    public function show($id){
        echo $id;
    }   
}