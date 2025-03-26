<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use App\Models\CheckOut; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Exports\QRScansExport;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function admin(){
        $prikaz = 0;
        return view('admin', compact("prikaz")); 
    }

    
    function adminPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
        ]); 

        $randomPassword = Str::random(12);

        do {
            $randomString = Str::random(12);
        } while (User::where('user_stringID', $randomString)->exists()); //unikaten stringID


        $user = new User(); 
        $user->name = $request->name; 
        $user->surname = $request->surname; 
        $user->email = $request->email;
        $user->temp_password = $randomPassword;
        $user->password = Hash::make($randomPassword);
        $user->user_stringID = $randomString; 
        $AliJeMail = $request->email; //preverjanje e-maila

        $MailObstaja = User::where('email', $request->email)->exists();

        if($MailObstaja)
        {
            return redirect(route("admin"))
                ->with("error", "Email, ki ga poskušate vnesti že obstaja");
        }
        else
        {
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
    }
    
    public function generateQRCode()
    {
        $user = Auth::user();

        $stringID = $user->user_stringID;


        $qrCode = QrCode::size(300)->generate($stringID);
              
        return view('welcome', compact('qrCode'));
    }

    public function exportQRScans(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        return Excel::download(new QRScansExport($month, $year), 'qr_scans.xlsx');
    }
}
