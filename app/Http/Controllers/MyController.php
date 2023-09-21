<?php

namespace App\Http\Controllers;

use App\Models\User;
use illuminate\Http\Request;

class MyController extends Controller
{
    function index(){
        return view('welcome');
    }

    function about(Request $request){
        return view('about', ['name'=>$request->name, 'age'=>$request->age]);
    }

  public  function login(){
        return view('login');
    }
    public function dashboard(Request $request){
        return view('dashboard', ['users'=> User::paginate(10)]);
        return view('dashboard', ['used'=> User::all()]);
    
        // if you want to access the dashboard without the auth middleware in your route
        // if ($request->user()) {
        //     return view('dashboard', );
        // }
        // else{
        //     return redirect('/login');
        // }
    }

    public  function edit($id){
        
        return view('edit', ['user'=>User::find($id)]);
      
    }
}