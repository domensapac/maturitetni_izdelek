<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class RacunController extends Controller
{
    public function racun(){
        return view('racun');
    }

    function RacunPost(Request $request){
        $request->validate([
            "password" => "required",
            "newpassword" => "required",
        ]);

        $user = Auth::user();

        if(Hash::check($request->password, $user->password))
        {
            $user->password = Hash::Make($request->newpassword);
            if($user->save())
            {    
                return redirect(route("racun"))
                    ->with("success", "Usprešno ste si spremenili geslo.");   
            }
            else
            {        
                return back()
                    ->with("error", "Napaka pri shranjevanju novega gesla");
            }
        }
        else
        {               
            return redirect(route("racun"))
                ->with("error", "Napačno trenutno geslo");
        }
    }
}