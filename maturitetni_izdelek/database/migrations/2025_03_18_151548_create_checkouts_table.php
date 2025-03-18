<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id(); // Primarni ključ
            $table->string('user_id');
            $table->date('checkout_date'); // Spremenjeno na 'date', da shrani samo datum (brez časa)
            $table->timestamps(); // Laravelova created_at in updated_at polja

            // Tuji ključ do users tabele (če uporabljaš users tabelo)
            $table->foreign('user_id')->references('user_stringID')->on('users')->onDelete('cascade'); //če zbrišeš userja se izbrišejo vsi zapisi v qr_scans (->onDelete('cascade'))
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};

