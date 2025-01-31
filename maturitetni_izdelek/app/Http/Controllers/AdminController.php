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

        $AliJeMail = $request->email; //preverjanje e-maila


        if(filter_var($AliJeMail, FILTER_VALIDATE_EMAIL))
        {
            if($user->save()){
                return redirect(route("admin")) 
                    ->with("uspeh", "Uporabnik uspešno dodan.");
            }
            return redirect(route("admin"))
                ->with("error", "Napaka pri dodajanju.");
        }else{
            return redirect(route("admin"))
                ->with("error", "Vnešen neveljaven email.");
        }
    }

    public function generateQRCode()
    {
        //Jure je pogledno
        $user = Auth::user();

        $data = "USER ID: {$user->id}";

        $qrCode = QrCode::size(300)->generate($data);

        return view('welcome', compact('qrCode'));
    }

}
