<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\LogIn;
use App\Http\Controllers\AdminController;

//do 'welcome' dostopaš samo če si prijavljen, če ne te vrže na login
Route::middleware("auth")->group(function () {
    Route::get("/", [AdminController::class, 'generateQRCode'])->name("welcome");
});

Route::get('/jedilnik', function(){
    return view('jedilnik');
    })->name("jedilnik"); 

Route::get('/racun', function(){
    return view('racun');
    })->name("racun"); 


Route::get('/prijava', [LogIn::class, 'logIn'])
    ->name("login"); 
    
Route::post('/prijava', [LogIn::class, 'logInPost'])
    ->name("login.post"); 

Route::get('/admin', function () {
    abort_if(!Auth::check() || Auth::user()->admin != 1, 403, 'Nimaš dostopa!');
    
    return view('admin'); // Ali klic kontrolerja
})->name("admin");


Route::post('/admin', [AdminController::class, 'adminPost'])
    ->name("admin.post"); 

Route::get('/logout', function () {
    Auth::logout(); 
    Session::flush();
    return redirect('/prijava'); 
})->name('logout');
    

