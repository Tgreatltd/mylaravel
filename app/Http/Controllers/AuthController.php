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
    else{
        return redirect()->route('dashboard');
    }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }

    public function update(Request $request, $id){
        $data =$request->validate([
            'firstName'=> 'required|string',
            'lastName'=> 'required|string',
        ]);

        $user = User::find($id);
        if(!$user){
           return redirect()->back()->with('error', 'User not found');
        }
        $user->firstName = $data['firstName'];
        $user->lastName = $data['lastName'];
        $user->save();
        return redirect()-> route('dashboard');
    }

    public function del($id){
        $user = User::find($id);
        if($user){
         $user->delete();
         return redirect()->route('dashboard');
        }
        // return redirect()->route('dashboard');
    }
}
