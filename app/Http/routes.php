<?php

// Route::get('/', ['as'=>'home', function () {
//     return view('welcome');
// }]); 

// Route::get('/page', function () {
//     // return view('page');
//     echo 1;
//     return;
// });
 
// Route::get('/form', function () {
//     return view('form');
// }); 


// Route::post('/comments', function () {
//     print_r($_POST);
// });
// // Route::math(['get','post'], '/comments', function () {
//     print_r($_POST);
// });
// Route::any('/comments', function () {
//     print_r($_POST);
// });


// Route::get('/test/{id?}', function ($id=0) {
    // return view('form');
// }); 

// Route::get('/test/{id}', function ($id) {
    // return view('form');
// })->where('id','[0-9]+'); 

// Route::get('/test/{id}/{cat}', function ($id,$cat) {
    // return view('form');
// })->where(['id','[0-9]+', 'cat','[A-Za-z]+']); 

// Route::group(['prefix'=>'admin/{id}'], function(){                                                   
// Route::group(['prefix'=>'admin'], function(){
//     Route::get('page/create', function () {
//         return redirect()->route('home');
//     }); 

//     Route::get('page/edit', function () {
//         echo 'page/edit';
//     }); 

//     // Route::get('page/article', function () {
//     //     return redirect()->route('article', array('id'=>25));
//     // }); 

//     Route::get('page/getname', function () {
//         $route = Route::current();
//         echo $route->getName();
//     })->name('getnameprefix'); 

//     // Route::get('page/getname/{id}', function ($id) {
//         // $route = Route::current();
//         // echo $route->getParameter('id',0);
//         // print_r($route->parameters());
//     // })->name('getnameprefix'); 
// });

// Route::get('/article/{id}', ['as'=>'article', function ($id) {
//     echo $id;
// }]); 


// Route::get('/about/{id}', 'FirstController@show'); 
// Route::get('/articles', ['uses'=>'Admin\Core@getArticles','as'=>'articles']); 
// Route::get('/article/{id}', ['uses'=>'Admin\Core@getArticle','as'=>'article']);  

// Route::controller('/controller','onlysController');

// Route::get('/article/{page}', ['uses'=>'Admin\Core@getArticle','as'=>'article','middleware'=>['mymiddle'.'second']]);
// Route::get('/article/{page}', ['uses'=>'Admin\Core@getArticle','as'=>'article','middleware'=>'mymiddle']);
// Route::get('/article/{page}', ['uses'=>'Admin\Core@getArticle',['middleware'=>'mymiddle:admin'],'as'=>'article']);

// Route::get('/testmiddleware', ['as'=>'home','middleware'=>'auth','uses'=>'Admin\IndexController@show']); 






Route::get('/', ['as'=>'home','uses'=>'Admin\IndexController@show']); 
Route::get('/about', ['as'=>'about','uses'=>'Admin\AboutController@show']); 
Route::get('/articles', ['as'=>'articles','uses'=>'Admin\Core@getArticles']); 
Route::get('/article/{id}', ['as'=>'article','uses'=>'Admin\Core@getArticle']); 
Route::get('/contact', ['middleware'=>['auth'],'uses'=>'Admin\ContactController@show','as'=>'contact']); 
Route::post('/contact', ['uses'=>'Admin\ContactController@store']); 

// Route::group(['middleware'=>['web']], function(){
//     Route::auth();
//     Route::get('/home', 'HomeController@index');
// });

// Route::auth();
// Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function(){
    // Route::get('/',['uses'=>'Admin\AdminController@show','as'=>'admin_index']);
    // Route::get('/add/post',['uses'=>'Admin\AdminPostController@create','as'=>'admin_post']);
// });

// // 30 lesson
// Route::group(['middleware'=>'web'], function(){
//     Route::get('/login', ['uses'=>'Auth\MyAuthController@showLogin']);
//     Route::post('/login', ['uses'=>'Auth\MyAuthController@authenticate']);
// });

// // Route::group(['prefix'=>'admin','middleware'=>['web','auth.basic']], function(){
// Route::group(['prefix'=>'admin','middleware'=>['web','auth.basic']], function(){
//     Route::get('/',['uses'=>'Admin\AdminController@show','as'=>'admin_index']);
//     Route::get('/add/post',['uses'=>'Admin\AdminPostController@create','as'=>'admin_post']);
// });



// 31 lesson
Route::group(['middleware'=>'web'], function(){
    Route::auth();
});

Route::group(['prefix'=>'admin','middleware'=>['web','auth']], function(){
    Route::get('/',['uses'=>'Admin\AdminController@show','as'=>'admin_index']);

    Route::get('/add/post',['uses'=>'Admin\AdminPostController@show','as'=>'admin_post']);
    Route::post('/add/post',['uses'=>'Admin\AdminPostController@create','as'=>'admin_post_p']);

    Route::get('/update/post/{id}',['uses'=>'Admin\AdminUpdatePostController@show','as'=>'admin_post']);
    Route::post('/update/post',['uses'=>'Admin\AdminUpdatePostController@create','as'=>'admin_update_post']);
});