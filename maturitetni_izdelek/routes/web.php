<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\LogIn;

Route::get('/login', [LogIn::class, 'logIn']); 

Route::get('/signup', [SignUp::class, 'signUp']); 

Route::get('/', function () {
    return view('welcome');
});
