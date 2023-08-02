<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login/auth', [LoginController::class, 'auth'])->name('auth');
    Route::post('/login', [LoginController::class, 'signup'])->name('signup');
});


Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //profile
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::put('/profile/password',[ProfileController::class,'updatepassword'])->name('profile.updatepassword');
    //UserDashboard
    Route::resource('/users', UserController::class)->middleware('role:admin')->names('users');

    //posts with images
    Route::get('/posts',[PostController::class,'index'])->middleware('auth')->name('posts.index');
    Route::get('/posts/create', [PostController::class,'create'])->middleware('manager:manager')->name('posts.create');
    Route::get('/posts/show/{post}',[PostController::class,'show'])->name('posts.show');
    Route::delete('/posts/delete/{post}',[PostController::class,'destroy'])->middleware('manager:manager')->name('posts.destroy');
    Route::post('/posts', [PostController::class,'store'])->middleware('auth')->middleware('manager:manager')->name('posts.store');
    Route::get('posts/edit/{post}',[PostController::class,'edit'])->middleware('manager:manager')->name('posts.edit');
    Route::put('/posts/update/{post}',[PostController::class,'update'])->middleware('manager:manager')->name('posts.update');
});


