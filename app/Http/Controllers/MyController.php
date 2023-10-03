<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use illuminate\Http\Request;

class MyController extends Controller
{
    function index(Request $request, $name){
        return view('welcome', ['name'=>$name]);
    }

    function home(Request $request, $name){
        return view('homeexample', ['name'=>$name]);
    }

    function profile(){
        return view('profile');
    }

    function about($name){
        return view('about', ['name'=>$name]);
    }

  public  function login(){
        return view('login');
    }
    public function dashboard(Request $request){
        // return view('dashboard', ['users'=> User::paginate(1)]);
      
        return view('dashboard', ['users'=> User::all()]);
        // return view('dashboard', ['users'=> User::all(),'userName'=>auth()->user()]);

        
        // if you want to access the dashboard without the auth middleware in your route
        // $user= User::all();
        // if ($user) {
        //     return view('dashboard',compact('user'));
        // }
        // else{
        //   return  redirect('/login');
        // }
    }

    public  function edit($id){
        
        return view('edit', ['user'=>User::find($id)]);
      
    }

    public function image(){
       return view('image', ['users'=>image::all()]);
    }
}