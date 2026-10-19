
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - EL FAR HOTEL</title>
</head>
<body style="margin:0;padding:24px;background:#f3f6f4;font-family:Arial,sans-serif;color:#26352d;">
    <div style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:12px;overflow:hidden;">

        <div style="background:#214b3b;padding:28px;text-align:center;color:#ffffff;">
            <h1 style="margin:0;">EL FAR HOTEL</h1>
            <p style="margin:8px 0 0;">Konfirmasi Pembayaran</p>
        </div>

        <div style="padding:28px;">
            <h2 style="color:#214b3b;">Halo, {{ $booking->nama }}!</h2>

            <p>
                Pembayaran untuk reservasi kamu berhasil dicatat.
                Berikut ringkasan transaksi terbaru.
            </p>

            <table style="width:100%;border-collapse:collapse;margin:20px 0;">
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Kode Booking</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;font-weight:bold;">
                        {{ $booking->kode_booking }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Pembayaran Terbaru</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;font-weight:bold;color:#176534;">
                        Rp {{ number_format($jumlahPembayaran, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Metode Pembayaran</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        {{ strtoupper($metodePembayaran) }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Total Tagihan</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        Rp {{ number_format($totalTagihan, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Total Dibayar</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">
                        Rp {{ number_format($totalDibayar, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;">Sisa Tagihan</td>
                    <td style="padding:10px;border-bottom:1px solid #e2e8e4;font-weight:bold;">
                        Rp {{ number_format(max(0, $totalTagihan - $totalDibayar), 0, ',', '.') }}
                    </td>
                </tr>
            </table>

            @if ($totalDibayar >= $totalTagihan)
                <p style="padding:12px;background:#e8f7ee;color:#176534;border-radius:8px;">
                    Pembayaran kamu sudah lunas. Terima kasih telah memilih EL FAR HOTEL!
                </p>
            @else
                <p>
                    Pembayaran masih sebagian. Silakan selesaikan sisa tagihan
                    sesuai ketentuan reservasi.
                </p>
            @endif

            <p style="margin-top:28px;">
                Salam hangat,<br>
                <strong>Tim EL FAR HOTEL</strong>
            </p>
        </div>

        <div style="background:#f3f6f4;padding:16px;text-align:center;color:#68756d;font-size:12px;">
            Email ini dikirim otomatis sebagai pemberitahuan transaksi pembayaran.
        </div>
    </div>
</body>
</html>
