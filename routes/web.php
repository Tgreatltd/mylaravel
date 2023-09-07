<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MyController::class, 'index']);
// Route::get('/about/{name=?}/{age=?}', [MyController::class, 'about/name/age'])->name('about/name/age');
Route::get('/about', [MyController::class, 'about'])->name('about');

Route::get('/dashboard/{name?}/{age?}', function ($name=null,$age=null) {
    return view('dashboard',['name'=>$name,'age'=>$age]);
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'signup'])->name('signup');


// fallback is used to handle 404 error pages
Route::fallback(function(){
    return 'Not Found';
});
