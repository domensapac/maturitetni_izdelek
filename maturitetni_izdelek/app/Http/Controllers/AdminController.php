<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use App\Models\CheckOut; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Exports\QRScansExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;


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
                    Mail::to($user->email)->send(new WelcomeMail($user, $randomPassword));
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


        $qrCode = QrCode::size(280)
            ->color(255,255,255)
            ->backgroundColor(20, 20, 20)
            ->generate($stringID);
              
        $scanCount = $this->getMonthlyScanCount();


        return view('welcome', compact('qrCode' , 'scanCount'));
    }

    public function exportQRScans(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        return Excel::download(new QRScansExport($month, $year), 'qr_scans.xlsx');
    }

    public function getMonthlyScanCount()
    {
        $user = Auth::user();

        
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $currentUser = $user->user_stringID;



        return DB::table('qr_scans') 
            ->where('user_id', $currentUser)
            ->whereYear('scanned_at', $currentYear)
            ->whereMonth('scanned_at', $currentMonth)
            ->count();
    }
}
