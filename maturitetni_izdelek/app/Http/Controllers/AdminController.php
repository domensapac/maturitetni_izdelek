<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('admin'); 
    }

    function adminPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]); 

        $user = new User(); 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = Hash::make($request->password); 

        if($user->save()){
            return redirect(route("login")) 
                ->with("success", "User created successfully");
        }
        return redirect("admin"())
            -with("error", "Failer to create account");
    }
}
