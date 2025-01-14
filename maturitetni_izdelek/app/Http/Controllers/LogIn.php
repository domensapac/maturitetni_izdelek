<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LogIn extends Controller
{
    public function logIn(){
        return view('login'); 
    }

    function logInPost(Request $request){
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]); 
        $credentials = $request->only("email", "password"); 
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("welcome")); //po prijavi te vrže na welcome
        }
        return redirect(route("login"))
            ->with("error", "Neuspešna prijava"); 
    }


    

    
}
