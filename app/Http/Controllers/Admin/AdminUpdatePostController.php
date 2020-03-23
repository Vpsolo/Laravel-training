<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\User;
use Auth;
use Gate;

class AdminUpdatePostController extends Controller
{
    public function show(Request $request, $id){
        $article = Article::find($id);
        return view('layout.update_post', [
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
            'script'=>'<script>alert("hello")</script>',
            'article'=>$article,
        ]);
    }

    public function create(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);

        $user = Auth::user();
        $data = $request->all();

        $data = $request->except('_token');

        $article = Article::find($data['id']);

        // $this->authorize('update', $article);
        $this->authorizeForUser($user, 'update', $article);

        // if(Gate::forUser(6)->allows('update-article', $article)){
        // if(Gate::allows('update', $article)){
        // if($request->user()->can('update', $article)){
            $article->name = $data['name'];
            $article->img = $data['img'];
            $article->text = $data['text'];

            $res = $user->articles()->save($article);

            return redirect()->back()->with('message','Материал обновлен');
        // }

        return redirect()->back()->with('message','У вас нет прав');
    }
}