<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Booking extends Model
{
    protected $fillable = [
    'kode_booking',
    'nama',
    'email',
    'telepon',
    'checkin',
    'checkout',
    'tipe_kamar',
    'jumlah_tamu',
    'status',
    'room_id',
    ];

    public function paymentTransactions(): HasMany
{
    return $this->hasMany(PaymentTransaction::class)
        ->orderByDesc('tanggal_pembayaran');
}

public function room(): BelongsTo
{
    return $this->belongsTo(Room::class);
}

}
