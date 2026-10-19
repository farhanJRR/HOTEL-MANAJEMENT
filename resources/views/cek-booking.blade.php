<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Booking - ELFAR HOTEL </title>

    <style>
        
* {
    box-sizing: border-box;
}

:root {
    --emerald: #064e3b;
    --emerald-dark: #022c22;
    --gold: #c9a45c;
    --text: #24332b;
    --muted: #68756c;
    --border: #e3e8e3;
    --surface: #ffffff;
    --page: #f5f7f4;
}

body {
    margin: 0;
    padding: 28px 20px;
    font-family: "Segoe UI", Arial, sans-serif;
    background: var(--page);
    color: var(--text);
    line-height: 1.6;
}

.container {
    width: 100%;
    max-width: 760px;
    margin: 20px auto;
}

.header {
    position: relative;
    overflow: hidden;
    padding: 32px;
    margin-bottom: 22px;
    background: linear-gradient(135deg, #064e3b, #0b6047);
    border: 1px solid rgba(201, 164, 92, .65);
    border-top: 4px solid var(--gold);
    border-radius: 15px;
    color: #ffffff;
    box-shadow: 0 10px 28px rgba(6, 78, 59, .10);
}

.brand {
    color: #e6c982;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 3px;
}

h1 {
    margin: 13px 0 9px;
    font-size: clamp(27px, 4vw, 34px);
    line-height: 1.25;
    letter-spacing: -.5px;
}

.header p {
    max-width: 580px;
    margin-bottom: 0;
    color: #e4ede7;
    font-size: 14px;
    line-height: 1.8;
}

.panel {
    padding: 28px;
    margin-bottom: 22px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 13px;
    box-shadow: 0 6px 22px rgba(30, 52, 37, .045);
}

.result-title {
    margin: 0 0 22px;
    padding-bottom: 13px;
    border-bottom: 1px solid var(--border);
    border-left: 3px solid var(--gold);
    padding-left: 12px;
    color: var(--emerald);
    font-size: 20px;
    line-height: 1.4;
}

.field {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #34443a;
    font-size: 13px;
    font-weight: 700;
}

input {
    display: block;
    width: 100%;
    min-height: 46px;
    padding: 12px 14px;
    border: 1px solid #d7dfd8;
    border-radius: 9px;
    background: #fbfcfa;
    color: var(--text);
    font: inherit;
    font-size: 14px;
    outline: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

input::placeholder {
    color: #9aa49c;
}

input:focus {
    border-color: var(--emerald);
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(6, 78, 59, .10);
}

button,
.back {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 19px;
    border: 1px solid transparent;
    border-radius: 9px;
    background: var(--emerald);
    color: #ffffff;
    text-decoration: none;
    font: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: background .2s, transform .2s, box-shadow .2s;
}

button {
    width: 100%;
    border-color: var(--gold);
}

button:hover,
.back:hover {
    background: var(--emerald-dark);
    color: #ffffff;
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(6, 78, 59, .12);
}

.error {
    margin-bottom: 17px;
    padding: 13px 15px;
    border: 1px solid #fecaca;
    border-left: 4px solid #dc2626;
    border-radius: 8px;
    background: #fef2f2;
    color: #991b1b;
    font-size: 13px;
    line-height: 1.6;
    overflow-wrap: anywhere;
}

.result-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 13px;
}

.detail {
    min-width: 0;
    padding: 16px;
    border: 1px solid #e7ebe6;
    border-radius: 9px;
    background: #fafbf9;
    overflow-wrap: anywhere;
}

.detail span {
    display: inline-block;
    margin-bottom: 6px;
    color: var(--muted);
    font-size: 12px;
    font-weight: 500;
}

.detail strong {
    color: #25352b;
    font-size: 14px;
    line-height: 1.6;
}

.badge {
    display: inline-block;
    max-width: 100%;
    padding: 6px 10px;
    border: 1px solid #e2e8e3;
    border-radius: 7px;
    background: #f1f5f2;
    color: #47534a;
    font-size: 12px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.badge.success {
    background: #e7f5eb;
    border-color: #c6e7cf;
    color: #20653b;
}

.badge.warning {
    background: #fff7e6;
    border-color: #ead9ad;
    color: #805f1c;
}

.footer {
    margin-top: 22px;
    color: var(--muted);
    text-align: center;
    font-size: 12px;
}

@media (max-width: 550px) {
    body {
        padding: 12px;
    }

    .container {
        margin-top: 8px;
    }

    .header,
    .panel {
        padding: 21px 18px;
    }

    .header {
        border-radius: 12px;
    }

    .result-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 10px;
    }

    h1 {
        font-size: 26px;
    }

    .result-title {
        font-size: 18px;
    }

    .detail {
        padding: 14px;
    }
}

@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        transition: none !important;
    }
}

    </style>
</head>
<body>

<div class="container">

    <header class="header">
        <div class="brand">STAYVIEW 360°</div>
        <h1>Cek Status Booking</h1>
        <p>
            Bina Darma Hotel. Masukkan kode booking dan nomor telepon
            yang kamu gunakan saat melakukan reservasi.
        </p>
    </header>

    <section class="panel">
        <h2 class="result-title">Cari Reservasi</h2>

        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                Periksa kembali kode booking dan nomor telepon yang dimasukkan.
            </div>
        @endif

        <form action="{{ route('booking.check') }}" method="POST">
            @csrf

            <div class="field">
                <label for="kode_booking">Kode Booking</label>
                <input
                    id="kode_booking"
                    type="text"
                    name="kode_booking"
                    value="{{ old('kode_booking') }}"
                    placeholder="Contoh: SV-AB12CD34"
                    maxlength="30"
                    required
                >
            </div>

            <div class="field">
                <label for="telepon">Nomor Telepon</label>
                <input
                    id="telepon"
                    type="tel"
                    name="telepon"
                    value="{{ old('telepon') }}"
                    placeholder="Nomor telepon saat reservasi"
                    maxlength="30"
                    required
                >
            </div>

            <button type="submit">Cek Status Booking</button>
        </form>
    </section>

    @isset($booking)
        @php
            $statusLabel = [
                'menunggu' => 'Menunggu Konfirmasi',
                'dikonfirmasi' => 'Dikonfirmasi',
                'dibatalkan' => 'Dibatalkan',
            ];

            $statusBayarLabel = [
                'belum_bayar' => 'Belum Bayar',
                'sebagian' => 'Dibayar Sebagian',
                'lunas' => 'Lunas',
            ];

            $statusMenginapLabel = [
                'belum_checkin' => 'Belum Check-in',
                'sedang_menginap' => 'Sedang Menginap',
                'selesai' => 'Selesai Menginap',
            ];

            $statusBooking = $booking->status ?? 'menunggu';
            $statusBayar = $booking->status_pembayaran ?? 'belum_bayar';
            $statusMenginap = $booking->status_menginap ?? 'belum_checkin';
        @endphp

        <section class="panel">
            <h2 class="result-title">Detail Reservasi</h2>

            <div class="field">
                <span style="display:block;color:#667085;font-size:12px;margin-bottom:7px;">
                    Kode Booking
                </span>
                <strong>{{ $booking->kode_booking }}</strong>
            </div>

            <div class="result-grid">
                <div class="detail">
                    <span>Nama Tamu</span>
                    <strong>{{ $booking->nama }}</strong>
                </div>

                <div class="detail">
                    <span>Status Booking</span>
                    <strong>
                        <span class="badge {{ $statusBooking === 'dikonfirmasi' ? 'success' : ($statusBooking === 'menunggu' ? 'warning' : '') }}">
                            {{ $statusLabel[$statusBooking] ?? ucfirst($statusBooking) }}
                        </span>
                    </strong>
                </div>

                <div class="detail">
                    <span>Check-in Terjadwal</span>
                    <strong>{{ $booking->checkin }}</strong>
                </div>

                <div class="detail">
                    <span>Check-out Terjadwal</span>
                    <strong>{{ $booking->checkout }}</strong>
                </div>

                <div class="detail">
                    <span>Tipe Kamar</span>
                    <strong>{{ $booking->tipe_kamar }}</strong>
                </div>

                <div class="detail">
                    <span>Jumlah Tamu</span>
                    <strong>{{ $booking->jumlah_tamu }} orang</strong>
                </div>

                <div class="detail">
                    <span>Status Pembayaran</span>
                    <strong>
                        <span class="badge {{ $statusBayar === 'lunas' ? 'success' : ($statusBayar === 'sebagian' ? 'warning' : '') }}">
                            {{ $statusBayarLabel[$statusBayar] ?? ucfirst($statusBayar) }}
                        </span>
                    </strong>
                </div>

                <div class="detail">
                    <span>Status Menginap</span>
                    <strong>
                        {{ $statusMenginapLabel[$statusMenginap] ?? ucfirst($statusMenginap) }}
                    </strong>
                </div>
            </div>

            <p style="font-size:12px;color:#667085;line-height:1.6;margin-top:18px;">
                Status di atas mengikuti data terakhir yang tercatat oleh hotel.
                Jika ada pertanyaan atau perbedaan data, silakan hubungi pihak hotel.
            </p>
        </section>
    @endisset

    <div style="text-align:center;">
        <a class="back" href="{{ url('/') }}">← Kembali ke Halaman Utama</a>
    </div>

    <div class="footer">
        StayView 360° · Bina Darma Hotel
    </div>

</div>

</body>
</html>
