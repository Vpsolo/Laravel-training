<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class onlysController extends Controller
{ 
    public function getIndex(){
        echo __METHOD__;
    }
    public function postIndex(){
        print_r($_POST);
    }
}
