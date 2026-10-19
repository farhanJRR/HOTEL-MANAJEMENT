
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('status_pembayaran')
                ->default('belum_bayar');

            $table->string('metode_pembayaran')
                ->nullable();

            $table->decimal('jumlah_dibayar', 12, 2)
                ->default(0);

            $table->timestamp('tanggal_pembayaran')
                ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'status_pembayaran',
                'metode_pembayaran',
                'jumlah_dibayar',
                'tanggal_pembayaran',
            ]);
        });
    }
};
