<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware("auth")->group(function (){

    Route::get('/',function(){
        return Inertia::render('Home',[
            'time' => now()->toTimeString()
        ]);
    });

    Route::get('/users',[UserController::class,'index'])->name('user.index');
    Route::get('/user/create',[UserController::class,'create'])->name('user.create');
    Route::post('/user',[UserController::class,'store']);
    Route::get('/user/{user}/edit',[UserController::class,"edit"]);
    Route::put('/user/{user}',[UserController::class,"update"])->name('user.update');
    Route::delete('/user/{user}',[UserController::class,'destroy']);
    Route::get('/setting',function(){
        return Inertia::render('Setting');
    });

});


