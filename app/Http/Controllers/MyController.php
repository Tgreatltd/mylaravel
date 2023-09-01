<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class MyController extends Controller
{
    function index(){
        return view('welcome');
    }

    function about(Request $request){
        return view('about', ['name'=>$request->name, 'age'=>$request->age]);
    }
}