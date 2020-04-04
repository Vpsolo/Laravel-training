<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;

class PagesEditController extends Controller
{
  // При передаче индентификатора(id) можно записывать как показоно ниже, тогда ларавел сам будет искать из БД подходящую запись по id 
  public function execute(Page $page, Request $request){
    // $page = Page::find($id);
    $old = $page->toArray();
    if(view()->exists('admin.pages_edit')){
      $data = [
        'title'=>'Редактирование страницы - '.$old['name'],
        'data'=>$old
      ];
      return view('admin.pages_edit',$data);
    }
    dd($old);
  }
}
