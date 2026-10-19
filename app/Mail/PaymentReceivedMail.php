<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Booking $booking,
        public float $jumlahPembayaran,
        public float $totalTagihan,
        public float $totalDibayar,
        public string $metodePembayaran
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pembayaran - EL FAR HOTEL',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.payment-received',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
