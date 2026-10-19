<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('kode_booking')->unique();
        $table->string('nama');
        $table->string('telepon');
        $table->date('checkin');
        $table->date('checkout');
        $table->string('tipe_kamar');
        $table->unsignedTinyInteger('jumlah_tamu');
        $table->string('status')->default('menunggu');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
