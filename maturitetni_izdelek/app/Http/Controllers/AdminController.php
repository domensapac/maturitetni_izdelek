<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class AdminController extends Controller
{
    public function admin(){
        return view('admin'); 
    }

    function adminPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
        ]); 

        $randomPassword = Str::random(12);

        $user = new User(); 
        $user->name = $request->name; 
        $user->surname = $request->surname; 
        $user->email = $request->email; 
        $user->password = Hash::make($randomPassword);


        if($user->save()){
            return redirect(route("login")) 
                ->with("success", "User created successfully");
        }
        return redirect("admin"())
            -with("error", "Failer to create account");
    }

    public function generateQRCode()
    {
        $user = Auth::user();

        $data = "ID: {$user->id}, Name: {$user->name}, Last Name: {$user->last_name}";

        $qrCode = QrCode::size(200)->generate($data);

        return view('welcome', compact('qrCode'));
    }

}
