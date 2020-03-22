<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use User;

class AdminController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
        // $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function show(){
        // $user = Auth::user();
        // Auth::check();
        // Auth::id();
        // Auth::viaRemember()

        if(!Auth::check()){
            // $user = User::find(5);
            // Auth::login($user);
            // Auth::guard('web')->login($user);
            // Auth::guard('web')->logout(); // это у меня не работает, но работает если включить гард в конструкторе
            // Auth::loginUsingId(5);
            Auth::loginUsingId(5);


            // return redirect('/login');
        }
        // if(Auth::viaRemember()){
            // echo 'yes';
        // }
        
        return view('welcome');
    }
}
