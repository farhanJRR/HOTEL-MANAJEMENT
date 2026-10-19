<?php
namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BookingBaruNotification extends Notification
{
    use Queueable;

    public function __construct(public Booking $booking)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'booking_id' => $this->booking->id,
            'kode_booking' => $this->booking->kode_booking,
            'nama_tamu' => $this->booking->nama,
            'tanggal_checkin' => $this->booking->checkin,
            'tanggal_checkout' => $this->booking->checkout,
            'pesan' => 'Booking baru dari ' . $this->booking->nama,
        ];
    }
}