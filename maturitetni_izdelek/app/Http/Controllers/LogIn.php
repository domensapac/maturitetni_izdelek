<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogIn extends Controller
{
    public function logIn(Request $request){
        return view('login'); 
    }
}
