<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Article;
use App\User;
use App\Country;
use App\Role;

class Core extends Controller
{
    protected static $articles;

    public function __construct(){
        // $this->middleware('mymiddle');
    }

    public static function addArticles($array){
      return self::$articles[] = $array;
    }

    // public function getArticles(){
    //   // SELECT
    //   // DB::table('articles')->get();
    //   // DB::table('articles')->first(); // limit 1
    //   // DB::table('articles')->value('name');
    //   // DB::table('articles')->pluck('name');
    //   // DB::table('articles')->chunck(2, function($articles){
    //   //   foreach($articles as $article){
    //   //     Core::addArticles($article);
    //   //   } 
    //   // });
    //   // DB::table('articles')->count();
    //   // DB::table('articles')->select('name','id','text')->get();
    //   // DB::table('articles')->distinct()->select('name')->get();

    //   // WHERE
    //   // $query->addSelect('text As fulltext')->where()->get();
    //   // DB::table('articles')->select('text As fulltext')->where('id','=',5)->get();
    //   // $articles = DB::table('articles')->select('text As fulltext')
    //   //                                                 ->where('id','>',5)
    //   //                                                 ->where('text','like','TEXT%')
    //   //                                                 // ->where('text','like','TEXT%','or')
    //   //                                                 // ->orWhere('id','<',5)
    //   //                                                 ->get();
    //   // $articles = DB::table('articles')->select('text As fulltext')
    //   //                                                 ->where([
    //   //                                                     ['id','>',5],
    //   //                                                     ['text','like','TEXT%','or']
    //   //                                                   ])
    //   //                                                 ->get();
    //   // DB::table('articles')->whereBetween('id',[1,5])->get(); // between это диапозон поиска
    //   // DB::table('articles')->whereNotBetween('id',[1,5])->get();
    //   // DB::table('articles')->whereIn('id',[1,5])->get(); // In это замена слову or
    //   // DB::table('articles')->whereNotIn('id',[1,5])->get();
    //   // DB::table('articles')->groupBy('name')->get();
      
    //   // Limit
    //   // DB::table('articles')->take(4)->get();
    //   // DB::table('articles')->take(4)->skip(2)->get();
       
    //   // INSERT
    //   // DB::table('articles')->insert(['name'=>'Hello','text'=>'Lorem ipsum']);
    //   // DB::table('articles')->insertGetId(['name'=>'Hello','text'=>'Lorem ipsum']); // возвращает последний Id созданнуой строки

    //   // UPDATE
    //   // DB::table('articles')->where('id',5)->update(['name'=>'Hello','text'=>'Lorem ipsum']);

    //   // DELETE
    //   // DB::table('articles')->where('id',5)->delete();
      
    //   // Model
    //   // SELECT
    //   // Article::all();
    //   // Article::where('id',1)->first();
    //   // Article::where('id', '>', 3)->get();
    //   // Article::where('id', '>', 3)->orderBy('name')->take(2)->get();
    //   // Article::chunk(2, function(){});
    //   // Article::find(1);
    //   // Article::find([1,2,3]);
      
    //   // INSERT
    //   // $article = new Article;
    //   // $article->name = 'Insert new';
    //   // $article->text = 'Insert text';
    //   // $article->save();

    //   // UPDATE
    //   // $article = Article::find(3);
    //   // $article->name = 'Insert new';
    //   // $article->text = 'Insert text';
    //   // $article->save();

    //   // INSERT
    //   // Article::create(['name'=>'Hello world','text'=>'text11']);
    //   // Article::firstOrCreate(['name'=>'Hello world','text'=>'text11']); // Добавляет запись в буду, если нету совпадений по первому передаваемому параметру
    //   // Article::firstOrNew(['name'=>'Hello world','text'=>'text11']); // Приносит данные с БД по первому передаваемому параметр

    // }
    // public function getArticles(){
    //   // DELETE
    //   // Article::find(10)->delete();
    //   // Article::destroy([2,3]);
    //   // Article::where('id','>','3')->delete();

    //   // $user = User::find(1);
    //   // $country = Country::find(1);
    //   // $user->articles()->where('id','>',5)->get();
      
    //   // $article = Article::find(2);
    //   // dump($article->user->name);

    //   // $user = User::find(1);
    //   // dump($user->roles()->where('roles.id', 2)->first());

    //   // $user = Role::find(1);
    //   // dump($user->users);

    //   // Ленивая загрузка (плохой способ, не использовать)
    //   // $articles = Article::all();
    //   // foreach($articles as $article){
    //     // echo $article->user->name;
    //   // }

    //   // $articles = Article::all();
    //   // $articles->load('user');
    //   // foreach($articles as $article){
    //     // echo $article->user->name;
    //   // }

    //   // $users = User::with('articles','roles');
    //   // foreach($users as $user){
    //     // echo $user->roles;
    //   // }

    //   // $users = User::has('articles')->get();
    //   // $users = User::has('articles','>=','3')->get();
    //   // foreach($users as $user){
    //     // dump($user);
    //   // }

    //   // SELECT
    //   $user = User::find(1);
    //   $article = new Article([
    //     'name'=>'New article',
    //     'text'=>'New Text'
    //   ]);
    //   // $user->articles()->save($article);
    //   // $user->articles()->create([
    //     // 'name'=>'New article',
    //     // 'text'=>'New Text'
    //   // ]);
    //   // $user->articles()->saveMany([
    //   //   new Article(['name'=>'New article1','text'=>'New Text']),
    //   //   new Article(['name'=>'New article2','text'=>'New Text']),
    //   //   new Article(['name'=>'New article3','text'=>'New Text'])
    //   // ]);

    //   // $role = new Role(['name'=>'quest']);
    //   // $user->roles()->save($role);
      
    //   // UPDATE
    //   // $user->articles()->where('id',14)->update(['name'=>'New text']);

    //   return;
    // }   

    // 24 lesson
    public function getArticles(Request $request){
      // $country = Country::find(1);
      // $user = User::find(2);
      // $country->user()->associate($user); // меняет значения. Вариант, один ко многим
      // $country->save();

      // $articles = Article::all();
      // $user = User::find(2);
      // foreach($articles as $article){
      //   $article->user()->associate($user); // меняет значения. Вариант, один ко многим
      //   $article->save();
      // }

      // $user = User::find(2);
      // $role_id = Role::find(2)->id;
      // $user->roles()->attach($role_id);
      // $user->roles()->detach($role_id);
      

      // $article = Article::find(9);
      // $article->name = 'Some text';
      // echo $article->name; 

      // $article = Article::find(9);
      // $arr = ['key'=>'Hello world'];
      // $article->text = $arr;
      // $article->save();
      // dump($article->toArray());
      // dump($article->toJson());
      // dump((string)$article);

      return;  
    }

    public function getArticle($id){
        echo $id;
    }  
}
