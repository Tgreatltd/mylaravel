<?php

namespace App\Http\Controllers;

use App\Models\User;
use illuminate\Http\Request;

class MyController extends Controller
{
    function index(){
        return view('welcome');
    }
    function profile(){
        return view('profile');
    }

    function about(Request $request){
        return view('about', ['name'=>$request->name, 'age'=>$request->age]);
    }

  public  function login(){
        return view('login');
    }
    public function dashboard(Request $request){
        // return view('dashboard', ['users'=> User::paginate(1)]);
        return view('dashboard', ['users'=> User::all()]);

        
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
}