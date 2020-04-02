<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

class IndexController extends Controller
{
    public function execute(Request $request){
      $pages = Page::all(); 
      // $portfolio = Portfolio::all(); 
      $portfolio = Portfolio::get(array('name','filter','images')); 
      $services = Service::where('id','<',20)->get(); 
      $people = People::take(3)->get();

      return view('site.index');
    }
}
