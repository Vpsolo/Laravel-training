<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

use DB;

class IndexController extends Controller
{
    public function execute(Request $request){
      $pages = Page::all(); 
      $portfolios = Portfolio::get(array('name','filter','images')); 
      $services = Service::where('id','<',20)->get(); 
      $people = People::take(3)->get();

      $tags = DB::table('portfolios')->distinct()->lists('filter'); // >lists() переименовали в ->pluck() в версиях >5.2

      $menu = array();
      foreach($pages as $page){
        $item = array('title'=>$page->name,'alias'=>$page->alias);
        array_push($menu,$item);
      }

      $item = array('title'=>'Services','alias'=>'service');
      array_push($menu,$item);
      $item = array('title'=>'Portfolio','alias'=>'portfolio');
      array_push($menu,$item);
      $item = array('title'=>'Team','alias'=>'team');
      array_push($menu,$item);
      $item = array('title'=>'Contact','alias'=>'contact');
      array_push($menu,$item);

      return view('site.index',array(
        'menu'=>$menu,
        'pages'=>$pages,
        'services'=>$services,
        'portfolios'=>$portfolios,
        'peoples'=>$people,
        'tags'=>$tags
      ));
    }
}
