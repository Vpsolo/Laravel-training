<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gate;
use Auth;

class AdminPostController extends Controller
{
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

        return view('layout.add_post', $array);
    }

    public function create(Request $request){
        if(Gate::denies('add-article')){
            return redirect()->back()->with('message','У вас нет прав');
        }

        $this->validate($request, [
            'name'=>'required'
        ]);

        $user = Auth::user();
        $data = $request->all();
        
        $res = $user->articles()->create([
            'name'=>$data['name'],
            'img'=>$data['img'],
            'text'=>$data['text']
        ]);

        return redirect()->back()->with('message','Материал добавлен');
    }
}
 