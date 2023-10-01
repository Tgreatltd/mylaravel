<?php

namespace App\Http\Controllers;

use App\Mail\sendEmail;
use App\Models\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

       // to insert manually

        // User::insert([
        //     'firstName'=>$request->firstName,
        //     'password'=>$request->Hash::make($request->password)
        // ]);
        session()->flash('success','Your account has been registered');
        $mailing = ['subject'=>'welcome', 'message'=> 'you are welcome to our page'];
        Mail::to($request->email)->send(new sendEmail($mailing));
        // return Redirect()->back();
        return Redirect('/profile', );
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

    public function store(Request $request){
//       $request->validate([
//         'image' => 'image|max:2048', // Adjust validation rules as needed
//       ]);
//  // Store the uploaded image in the public/images directory
//  $request->file('image')->store('images', 'public');
// ;

//         // You can save the $imagePath to a database table if needed

//         // Redirect back with a success message
//         return redirect()->back()->with('success', 'Image uploaded successfully.');

  
        // Validate the uploaded image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048', // Adjust validation rules as needed
        ]);

        // Process the uploaded image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public'); // Store in the public/images directory

            // Optionally, you can save the image path to a database table
            // Example: Image::create(['path' => 'images/' . $imageName]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }

        // Handle the case where no image was provided
        return redirect()->back()->with('error', 'No image provided.');
  


    }
}
