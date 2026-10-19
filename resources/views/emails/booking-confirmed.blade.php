<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking EL FAR HOTEL</title>
</head>
<body style="margin:0;padding:24px;background:#f3f6f4;font-family:Arial,sans-serif;color:#26352d;">
    <div style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:12px;overflow:hidden;">

        <div style="background:#214b3b;padding:28px;text-align:center;color:#ffffff;">
            <h1 style="margin:0;">EL FAR HOTEL</h1>
            <p style="margin:8px 0 0;">Konfirmasi Reservasi</p>
        </div>

        <div style="padding:28px;">
            <h2 style="color:#214b3b;">Halo, {{ $booking->nama }}!</h2>

            <p>
                Kabar baik! Booking kamar kamu telah dikonfirmasi oleh
                tim EL FAR HOTEL. Berikut detail reservasinya.
            </p>

            <table style="width:100%;border-collapse:collapse;margin:20px 0;">
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Kode Booking</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;font-weight:bold;">
                        {{ $booking->kode_booking }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Tipe Kamar</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        {{ $booking->tipe_kamar }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Nomor Kamar</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        {{ $booking->room?->nomor_kamar ?? 'Belum ditetapkan' }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Check-in</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        {{ $booking->checkin }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Check-out</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        {{ $booking->checkout }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Jumlah Tamu</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        {{ $booking->jumlah_tamu }} orang
                    </td>
                </tr>
            </table>

            <p>
                Simpan kode booking ini untuk membantu proses check-in.
                Jika ada pertanyaan, silakan hubungi pihak hotel.
            </p>

            <p style="margin-top:28px;">
                Salam hangat,<br>
                <strong>Tim EL FAR HOTEL</strong>
            </p>
        </div>

        <div style="background:#f3f6f4;padding:16px;text-align:center;color:#68756d;font-size:12px;">
            Email ini dikirim otomatis. Mohon jangan membalas email ini.
        </div>
    </div>
</body>
</html>
