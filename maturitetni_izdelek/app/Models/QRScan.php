<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRScan extends Model
{
    use HasFactory;

    // To je ime tabele, ki jo bo ta model uporabljal
    protected $table = 'qr_scans';

    // To so atributi, ki so lahko masovno dodeljeni
    protected $fillable = ['user_id', 'scanned_at'];
}

