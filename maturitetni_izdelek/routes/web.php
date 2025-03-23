<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\LogIn;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QRScanController;
use App\Http\Controllers\RacunController;
use App\Http\Controllers\OdjaviMalico;

//do 'welcome' dostopaš samo če si prijavljen, če ne te vrže na login
Route::middleware("auth")->group(function () {
    Route::get("/", [AdminController::class, 'generateQRCode'])->name("welcome");

    Route::get('/qrscan', function () {
        abort_if(!Auth::check() || Auth::user()->admin != 1, 403, 'Nimaš dostopa!'); //dostop do /qrscan
        
        return view('qr_scan'); // Ali klic kontrolerja
    })->name("qrscan");

    Route::post('/qr-scan', [QRScanController::class, 'store'])->name('qr.scan');

});

//route za odjavo malice
Route::get('/odjavi', [OdjaviMalico::class, 'odjavi'])
    ->name("odjavi"); 
    
Route::post('/odjavi', [OdjaviMalico::class, 'OdjaviMalico'])
    ->name("odjavi.post"); 

//route za racun
Route::get('/racun', function(){
    return view('racun');
    })->name("racun");

Route::post('/racun', [RacunController::class, 'RacunPost'])
    ->name("racun.post");

//route za prijavo
Route::get('/prijava', [LogIn::class, 'logIn'])
    ->name("login"); 
    
Route::post('/prijava', [LogIn::class, 'logInPost'])
    ->name("login.post"); 

//route za admin
Route::get('/admin', function () {
    abort_if(!Auth::check() || Auth::user()->admin != 1, 403, 'Nimaš dostopa!'); //dostop do /admin
    
    return view('admin'); // Ali klic kontrolerja
})->name("admin");

Route::post('/admin', [AdminController::class, 'adminPost'])
    ->name("admin.post");

//addingUser
Route::get('/adding-user', function () {
    return view('AddingUser');
})->name('addingUser');

//Records
Route::get('/records', function () {
    return view('Records');
})->name('records');

//route za logout
Route::get('/logout', function () {
    Auth::logout(); 
    Session::flush();
    return redirect('/prijava'); 
})->name('logout');