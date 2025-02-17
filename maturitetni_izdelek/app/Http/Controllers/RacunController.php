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
            "email" => "required",
            //"password" => "required",
            "newpassword" => "required",
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            echo "Email, kateremu skušate spremeniti geslo, ne obstaja";
            /*
            return back()
                ->with("error", "Email, kateremu skušate spremeniti geslo, ne obstaja");
            */
        }
        else
        {
           $user->password = Hash::Make($request->newpassword);
           if($user->save())
           {
                echo "Uspešno spremenjeno geslo";
                /*
                return redirect(route("racun"))
                    ->with("uspeh", "Uspešno");
                */
           }
           else
           {
                echo "Napaka pri shranjevanju gesla";
                /*
                return back()
                    ->with("error", "Napaka pri shranjevanju novega gesla");
                */
           }
        }
    }
}