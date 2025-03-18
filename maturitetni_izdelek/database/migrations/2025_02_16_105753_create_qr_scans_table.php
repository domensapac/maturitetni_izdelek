<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('qr_scans', function (Blueprint $table) {
            $table->id(); // Primarni ključ
            $table->string('user_id'); // ID uporabnika
            $table->timestamp('scanned_at')->useCurrent(); // Kdaj je bilo skenirano
            $table->timestamps(); // Laravelova created_at in updated_at polja

            // Tuji ključ do users tabele (če uporabljaš users tabelo)
            $table->foreign('user_id')->references('user_stringID')->on('users')->onDelete('cascade'); //če zbrišeš userja se izbrišejo vsi zapisi v qr_scans (->onDelete('cascade'))
        });
    }

    public function down()
    {
        Schema::dropIfExists('qr_scans');
    }
};
