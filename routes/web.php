<?php

use App\Http\Controllers\MyController;
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

Route::get('/', [MyController::class, 'index']) ;
Route::get('/about/{name}/{age}', [MyController::class, 'about']);

Route::get('/dashboard/{name?}/{age?}', function ($name=null,$age=null) {
    return view('dashboard',['name'=>$name,'age'=>$age]);
});
