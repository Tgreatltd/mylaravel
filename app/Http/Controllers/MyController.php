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
        // return view('dashboard', ['users'=> User::paginate(10)]);
        // return view('dashboard', ['used'=> User::all()]);
        return view('dashboard', );
    }

    public  function edit($id){
        
        return view('edit', ['user'=>User::find($id)]);
      
    }
}