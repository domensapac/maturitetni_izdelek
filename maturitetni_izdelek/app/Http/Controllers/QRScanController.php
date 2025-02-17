<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QRScan; // Model QRScan, ki smo ga prej ustvarili

class QRScanController extends Controller
{
    public function store(Request $request)
    {
        // Validacija, da je 'user_id' prisoten
        $request->validate([
            'user_id' => 'required|integer', // Preveri, da je ID uporabnika številka
        ]);
    
        // Preverimo, ali uporabnik z danim ID-jem obstaja v bazi
        $user = User::find($request->user_id);
    
        if (!$user) {
            // Če uporabnik ne obstaja, vrnemo napako
            return back()->with('error', 'QR koda ni veljavna. Ta uporabnik ne obstaja.');
        }
    
        // Preveri, če je uporabnik že skeniral kodo danes
        $today = now()->toDateString();
        $existingScan = QRScan::where('user_id', $request->user_id)
                              ->whereDate('scanned_at', $today)
                              ->first();
    
        if ($existingScan) {
            // Če je že skeniral, obvestimo uporabnika
            return back()->with('error', 'QR koda je bila že skenirana danes.');
        }
    
        // Shrani skeniranje v bazo
        QRScan::create([
            'user_id' => $request->user_id,
            'scanned_at' => now(),
        ]);
    
        // Po uspešnem skeniranju, vrnemo uporabnika nazaj z obvestilom o uspehu
        return back()->with('success', 'QR koda je bila uspešno skenirana.');
    }
}
