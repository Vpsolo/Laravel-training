<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Response;

class AboutController extends Controller
{
    public function show(){
        $array = array(
            'title'=>'About',
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
        
        // return view('layout.about', $array);

        // $view = view('layout.about', $array)->render();
        // return (new Response($view))
        //                             ->header('Content-Type','newType')
        //                             ->header('Header-one','header')
        //                             ;
        // return response($view)
        //                     ->header('Content-Type','newType')
        //                     ->header('Header-one','header')
        //                     ;
        // return response()->json(['name'=>'Hello','surname'=>'World']);
        // return response($view)->withHeaders(['name'=>'Hello','surname'=>'World']);

        // return response()->download('public/robots.txt', 'mytext.txt', );

        // return redirect('/');
        // return redirect('/')->withInput(); // Записывает в сессиию переданные параметры 
        // return redirect('/')->with('param1','Hello'); // Записывает в сессиию переданные параметры
        // return redirect()->action('Admin\ContactController@show');

        // DB::select("SELECT * FROM `articles` WHERE id = ?",[2]);
        // DB::select("SELECT * FROM `articles` WHERE id = :id",['id'=>2]);
        // DB::insert("INSERT INTO `articles` (`name`, `text`) VALUES (?, ?)",['test 1', 'TEXT']);
        // DB::update("UPDATE `articles` SET `name`=? WHERE `id`=?", ["TEST 2", 7]);
        // DB::delete("DELETE FROM `articles` WHERE `id`=?", [7]);
        // DB::connection()->getPdo()->lastInsertId(); // Получение id последнеё записанной строки 
        // DB::statement('DROP table `articles`');

        $array += ['info' => DB::select("SELECT * FROM `pages` WHERE id = ?", [1])];
        return view('layout.about', $array);
    }
}
