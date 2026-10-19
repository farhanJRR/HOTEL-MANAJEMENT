```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar')->unique();
            $table->string('tipe_kamar');
            $table->unsignedInteger('harga_per_malam');
            $table->unsignedTinyInteger('kapasitas');
            $table->string('status')->default('tersedia');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};