<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;

    // To je ime tabele, ki jo bo ta model uporabljal
    protected $table = 'checkouts';

    protected $dates = ['checkout_date']; // Preverite, da je 'checkout_date' vključen v ta seznam

    // To so atributi, ki so lahko masovno dodeljeni
    protected $fillable = ['user_id','checkout_date'];
}
