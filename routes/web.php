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

Route::get('/board/{name?}/{age?}', function ($name=null,$age=null) {
    return view('board',['name'=>$name,'age'=>$age]);
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [MyController::class, 'login'])->name('login');
Route::get('/profile', [MyController::class, 'profile'])->name('profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/dashboard', [MyController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'isAdmin']);
Route::get('/edit/{id}', [MyController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AuthController::class, 'update'])->name('update');
Route::get('/del/{id}', [AuthController::class, 'del'])->name('del');

// fallback is used to handle 404 error pages
Route::fallback(function(){
    return 'Not Found';
});
