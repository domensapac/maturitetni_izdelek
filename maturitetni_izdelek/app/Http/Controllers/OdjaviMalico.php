<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckOut;
use Illuminate\Support\Facades\Auth;

class OdjaviMalico extends Controller
{
    public function odjavi(){
        return view('odjavi'); 
    }


    public function OdjaviMalico(Request $request)
    {


        $request->validate([
            'datum' => 'required|date',
        ]);

        $userId = Auth::id();
        $datum = \Carbon\Carbon::parse($request->input('datum'))->format('Y-m-d');

        // Preveri, ali je uporabnik že odjavil malico na ta datum
        $obstojecaOdjava = CheckOut::where('user_id', $userId)
            ->whereDate('checkout_date', $datum)
            ->exists();

        if ($obstojecaOdjava) {
            return back()->with('error', 'Malica za ta datum je že odjavljena!');
        }

        // Ustvari novo odjavo malice
        CheckOut::create([
            'user_id' => $userId,
            'checkout_date' => $datum,
        ]);

        return back()->with('success', 'Malica uspešno odjavljena!');
    }
}
