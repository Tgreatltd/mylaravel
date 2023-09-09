<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
   public function register(){
        return view('register');
    }
   public function signup(Request $request){

        $data =$request->validate([
            'firstName'=> 'required|string',
            'lastName'=> 'required|string',
            'email'=> 'required|string|email|unique:users',
            'password'=> 'required|string',
        ]);

        User::create($data);
        session()->flash('success','Your account has been registered');
        return Redirect()->back();
    }
    public function signin(Request $request){
        $token = auth() ->attempt(['email'=> $request->email, 'password'=>$request->password]);
    if(!$token){
        session()->flash('errorlogin', 'invalid Creds');
        return redirect()->back();
    }
    }
}
