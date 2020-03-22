<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // public function show(){
    //     // if(view()->exists('layout.layout')){} // проверка на сущетсвование такого vi

    //     // return view('layout.layout')->withTitle('Hello world');

    //     // $view = view('layout.layout',['title'=>'Hello world'])->render(); // сохранить контент данного вида
    //     // $view = view('layout.layout',['title'=>'Hello world'])->getPath(); // выводит путь к данному шаблону
    //     // echo $view;

    //     return view('layout.index');
    // }

    public function show(){
        $array = array(
            'title'=>'Laravel Project',
            'data'=>[
                'one'=>'List 1',
                'two'=>'List 2',
                'three'=>'List 3',
                'four'=>'List 4',
                'five'=>'List 5'
            ],
            'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
            'bvar'=>true,
            'script'=>'<script>alert("hello")</script>'
        );

        return view('layout.index', $array);
    }
}
