<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking - ELFAR HOTEL  </title>
     
    <style>
       

  * {
    box-sizing: border-box;
}

body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f3f5f9;
    margin: 0;
    padding: 32px;
    color: #172b4d;
}

h1 {
    margin: 0 0 8px;
    font-size: 30px;
    color: #102a43;
}

h2 {
    color: #102a43;
}

p {
    color: #667085;
}

button,
input,
select {
    font: inherit;
}

button {
    cursor: pointer;
    border: none;
    border-radius: 8px;
    padding: 10px 16px;
    background: #c49a45;
    color: white;
    font-weight: 600;
}

button:hover {
    background: #a77c2f;
}

a {
    color: #102a43;
}

.table-container {
    background: white;
    padding: 20px;
    border-radius: 14px;
    overflow-x: auto;
    margin-top: 24px;
    box-shadow: 0 5px 20px rgba(16, 42, 67, .06);
}

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 850px;
}

th,
td {
    padding: 15px 13px;
    border-bottom: 1px solid #edf0f4;
    text-align: left;
}

th {
    background: #102a43;
    color: white;
    font-size: 13px;
    letter-spacing: .3px;
}

td {
    font-size: 14px;
}

tbody tr:hover {
    background: #faf8f2;
}

select,
input {
    padding: 10px;
    border: 1px solid #d7dce3;
    border-radius: 8px;
    background: white;
}

form {
    margin-bottom: 12px;
}

.pagination-container {
    display: flex;
    justify-content: center;
    margin: 24px 0;
    font-size: 14px;
}

.pagination-container nav {
    display: flex;
    justify-content: center;
}

.pagination-container svg {
    width: 16px;
    height: 16px;
}

.pagination-container a,
.pagination-container span {
    padding: 8px 12px;
    border-radius: 7px;
    text-decoration: none;
}

.pagination-container a {
    color: #102a43;
    background: white;
    border: 1px solid #d7dce3;
}

.pagination-container a:hover {
    background: #f3f5f9;
}

.pagination-container [aria-current="page"] span {
    background: #102a43;
    color: white;
    border: 1px solid #102a43;
}

@media (max-width: 600px) {
    body {
        padding: 16px;
    }

    h1 {
        font-size: 24px;
    }
}


.booking-table-wrap {
    width: 100%;
    overflow-x: auto;
    margin-top: 16px;
    border: 1px solid #e2e8e4;
    border-radius: 10px;
    background: #ffffff;
}

.booking-table {
    width: 100%;
    min-width: 1450px;
    border-collapse: separate;
    border-spacing: 0;
    background: #ffffff;
}

.booking-table th,
.booking-table td {
    padding: 12px;
    border-bottom: 1px solid #e2e8e4;
    text-align: left;
    vertical-align: top;
    font-size: 13px;
}

.booking-table thead th {
    position: sticky;
    top: 0;
    z-index: 2;
    background: #214b3b;
    color: #ffffff;
    white-space: nowrap;
}

.booking-table tbody tr:nth-child(even) {
    background: #f8faf9;
}

.booking-table tbody tr:hover {
    background: #eef5f0;
}

.booking-table td select,
.booking-table td input {
    max-width: 100%;
}

.booking-repeat-heading th {
    background: #e2ebe5;
    color: #214b3b;
    padding: 10px;
    text-align: left;
    white-space: nowrap;
    border-bottom: 2px solid #214b3b;
}


/* ===== ELFAR HOTEL — PREMIUM BOOKING UI ===== */

:root {
    --hotel-green: #173f35;
    --hotel-green-dark: #102f28;
    --hotel-gold: #c5a15b;
    --hotel-bg: #f4f6f5;
    --hotel-text: #24352f;
    --hotel-muted: #718078;
    --hotel-border: #e2e9e5;
}

body {
    padding: 30px;
    background:
        radial-gradient(ellipse at top right, #e4eee8 0, transparent 38%),
        var(--hotel-bg);
    color: var(--hotel-text);
    line-height: 1.55;
}

body > nav {
    gap: 10px;
    padding: 12px;
    margin-bottom: 24px !important;
    background: #fff;
    border: 1px solid var(--hotel-border);
    border-radius: 16px;
    box-shadow: 0 5px 22px rgba(23, 63, 53, .05);
}

body > nav a {
    display: inline-flex;
    align-items: center;
    padding: 11px 15px !important;
    background: var(--hotel-green) !important;
    border: 1px solid transparent;
    border-radius: 10px !important;
    font-size: 13px;
    transition: background .2s, transform .2s;
}

body > nav a:hover {
    background: var(--hotel-green-dark) !important;
    transform: translateY(-1px);
}

body > div[style*="background:#102a43"] {
    background: linear-gradient(125deg, #102f28, #205747) !important;
    border: 1px solid rgba(197, 161, 91, .35);
    border-radius: 20px !important;
    padding: 34px !important;
    box-shadow: 0 14px 35px rgba(16, 47, 40, .14) !important;
}

body > div[style*="background:#102a43"] h1 {
    font-size: clamp(26px, 3vw, 36px);
    letter-spacing: -.8px;
}

.table-container {
    margin-top: 24px;
    padding: 18px;
    background: #fff;
    border: 1px solid var(--hotel-border);
    border-radius: 18px;
    box-shadow: 0 10px 32px rgba(23, 63, 53, .06);
}

.booking-table-wrap {
    margin-top: 0;
    border-color: var(--hotel-border);
    border-radius: 12px;
}

.booking-table {
    min-width: 1450px;
}

.booking-table th,
.booking-table td {
    padding: 14px 12px;
}

.booking-table thead th {
    padding-top: 16px;
    padding-bottom: 16px;
    background: var(--hotel-green);
    font-size: 11px;
    letter-spacing: .65px;
    text-transform: uppercase;
}

.booking-table tbody tr:nth-child(even) {
    background: #f8faf9;
}

.booking-table tbody tr:hover {
    background: #edf5f0;
}

.booking-table td {
    color: var(--hotel-text);
    line-height: 1.65;
}

.booking-table td form {
    margin-bottom: 10px;
}

.booking-table input,
.booking-table select,
.booking-table textarea {
    width: 100%;
    min-height: 40px;
    padding: 9px 11px;
    border: 1px solid #d8e2dc;
    border-radius: 9px;
    color: var(--hotel-text);
    background: #fff;
    font-size: 13px;
    transition: border-color .2s, box-shadow .2s;
}

.booking-table input:focus,
.booking-table select:focus,
.booking-table textarea:focus {
    outline: none;
    border-color: var(--hotel-green);
    box-shadow: 0 0 0 3px rgba(23, 63, 53, .1);
}

.booking-table button,
body > form button {
    border-radius: 9px;
    font-size: 12px;
    transition: filter .2s, transform .2s;
}

.booking-table button:hover,
body > form button:hover {
    filter: brightness(.92);
    transform: translateY(-1px);
}

.booking-table details {
    background: #fff;
    border-color: var(--hotel-border) !important;
    border-radius: 10px !important;
}

.booking-table summary {
    padding: 4px;
}

.booking-repeat-heading th {
    background: #e8f0eb;
    color: var(--hotel-green);
    font-size: 10px;
}

.pagination-container {
    margin: 24px 0;
}

.pagination-container a,
.pagination-container span {
    margin: 0 2px;
    border-radius: 9px;
}

@media (max-width: 768px) {
    body {
        padding: 14px;
    }

    body > div[style*="background:#102a43"] {
        padding: 22px !important;
    }

    .table-container {
        padding: 10px;
    }

    body > nav a {
        font-size: 12px;
    }
}



    </style>
</head>


<body>

    <nav style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:22px;">

    <a href="{{ route('admin.dashboard') }}"
       style="padding:12px 16px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;">
        ▦ Dashboard
    </a>

    <a href="{{ route('admin.rooms.index') }}"
       style="padding:12px 16px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;">
        ▣ Manajemen Kamar
    </a>

    <a href="{{ route('booking.calendar') }}"
       style="padding:12px 16px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;">
        ▦ Kalender Reservasi
    </a>

    <a href="{{ route('booking.report') }}"
       style="padding:12px 16px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;">
        ▧ Laporan Booking
    </a>

    <a href="{{ route('booking.revenue') }}"
       style="padding:12px 16px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;">
        ▧ Laporan Pendapatan
    </a>

</nav>

    <div style="background:#102a43;color:white;padding:28px 30px;border-radius:16px;display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;box-shadow:0 8px 25px #102a4320;">
        <div>
            <div style="color:#d8b568;font-size:12px;font-weight:bold;letter-spacing:3px;">
                ELFAR JUNIOR
            </div>
            <h1 style="color:white;margin-top:10px;">Manajemen Booking</h1>
            <p style="color:#d6e0eb;margin-bottom:0;">
                Bina Darma Hotel · Manajemen Reservasi
            </p>
        </div>

    </div>

@if (session('error'))
    <div style="background:#fee2e2;color:#991b1b;padding:14px 18px;border-radius:8px;margin:16px 0;">
        ❌ {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div style="background:#d1fae5;color:#065f46;padding:14px 18px;border-radius:8px;margin:16px 0;border:1px solid #a7f3d0;">
        ✅ {{ session('success') }}
    </div>
@endif

@if (session('booking_success'))
    <div style="background:#d1fae5;color:#065f46;padding:14px 18px;border-radius:8px;margin:16px 0;border:1px solid #a7f3d0;">
        ✅ {{ session('booking_success') }}
    </div>
@endif

    <p>Pantau pemesanan tamu hotel dalam satu halaman.</p>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:16px;margin:24px 0;">
        <div style="padding:22px;border-radius:12px;background:white;border-left:4px solid #4776a8;box-shadow:0 4px 16px #102a430c;">
            <p>Total Booking</p>
            <h2 style="color:#102a43;">{{ $totalBooking }}</h2>
        </div>

        <div style="padding:22px;border-radius:12px;background:white;border-left:4px solid #d6a23d;box-shadow:0 4px 16px #102a430c;">
            <p>Menunggu</p>
            <h2 style="color:#a77719;">{{ $menunggu }}</h2>
        </div>

        <div style="padding:22px;border-radius:12px;background:white;border-left:4px solid #299764;box-shadow:0 4px 16px #102a430c;">
            <p>Dikonfirmasi</p>
            <h2 style="color:#218052;">{{ $dikonfirmasi }}</h2>
        </div>

        <div style="padding:22px;border-radius:12px;background:white;border-left:4px solid #d9534f;box-shadow:0 4px 16px #102a430c;">
            <p>Dibatalkan</p>
            <h2 style="color:#c03935;">{{ $dibatalkan }}</h2>
        </div>
    </div>

    
<form action="{{ route('booking.index') }}" method="GET"
      style="display:flex;gap:10px;margin:20px 0;flex-wrap:wrap;">

    <input
        type="text"
        name="cari"
        placeholder="Cari nama atau kode booking..."
        value="{{ request('cari') }}"
        style="padding:12px;border:1px solid #ddd;border-radius:8px;flex:1;min-width:220px;"
    >

    
<select
    name="status"
    style="padding:12px;border:1px solid #ddd;border-radius:8px;background:white;min-width:180px;"
>
    <option value="semua" {{ request('status', 'semua') == 'semua' ? 'selected' : '' }}>
        Semua Status
    </option>
    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>
        Menunggu
    </option>
    <option value="dikonfirmasi" {{ request('status') == 'dikonfirmasi' ? 'selected' : '' }}>
        Dikonfirmasi
    </option>
    <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>
        Dibatalkan
    </option>
</select>


    <button type="submit"
            style="padding:12px 20px;border:0;border-radius:8px;background:#c49a45;color:white;cursor:pointer;">
        Cari
    </button>

    <a href="{{ route('booking.index') }}"
       style="padding:12px 20px;border-radius:8px;background:#e5e7eb;color:#243044;text-decoration:none;display:inline-flex;align-items:center;">
        Reset
    </a>
</form>




    <div class="table-container">
        <div class="booking-table-wrap">
    <table class="booking-table">
            
<thead>
    <tr>
        <th>Kode Booking</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Tipe Kamar</th>
        <th>Tamu</th>
        <th>Status</th>
        <th>Pembayaran</th>
        <th>Kuitansi</th>
        <th>Aksi Menginap</th>
        <th>Nomor Kamar</th>
    </tr>
</thead>



<tbody>
    @forelse ($bookings as $booking)

        {{-- Ulangi judul sebelum booking kedua dan seterusnya --}}
        @if (!$loop->first)
            <tr class="booking-repeat-heading">
                <th>Kode Booking</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Tipe Kamar</th>
                <th>Tamu</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th>Kuitansi</th>
                <th>Aksi Menginap</th>
            </tr>
        @endif

        <tr>

            <td>{{ $booking->kode_booking }}</td>
            <td>{{ $booking->nama }}</td>
            <td>{{ $booking->telepon }}</td>
            <td>{{ $booking->email ?? '-' }}</td>
            <td>{{ $booking->checkin }}</td>
            <td>{{ $booking->checkout }}</td>
            
<td>{{ $booking->tipe_kamar }}</td>

{{-- Penetapan Nomor Kamar --}}


{{-- Nomor Kamar --}}
<td style="min-width:180px;">
    @if ($booking->room_id && $booking->room)
        <div style="padding:12px;background:#e8f7ee;border-radius:8px;color:#176534;margin-bottom:8px;">
            <strong>Kamar {{ $booking->room->nomor_kamar }}</strong>
            <div style="font-size:12px;margin-top:5px;">
                ✅ Kamar sudah ditetapkan
            </div>
        </div>

        <details style="border:1px solid #dfe7e2;border-radius:8px;padding:8px;">
            <summary style="cursor:pointer;color:#214b3b;font-weight:600;">
                🔧 Ubah Kamar
            </summary>

            @php
                $kamarPengganti = $daftarKamar
                    ->where('tipe_kamar', $booking->tipe_kamar)
                    ->where('id', '!=', $booking->room_id)
                    ->where('status', '!=', 'perbaikan');
            @endphp

            @if ($kamarPengganti->isNotEmpty())
                <form action="{{ route('booking.changeRoom', $booking) }}"
                      method="POST"
                      style="margin-top:12px;">
                    @csrf
                    @method('PATCH')

                    <label style="display:block;margin-bottom:5px;">
                        Nomor Kamar Baru
                    </label>

                    <select name="room_id" required
                            style="width:100%;margin-bottom:10px;">
                        <option value="">Pilih kamar pengganti</option>

                        @foreach ($kamarPengganti as $room)
                            <option value="{{ $room->id }}">
                                {{ $room->nomor_kamar }}
                            </option>
                        @endforeach
                    </select>

                    <label style="display:block;margin-bottom:5px;">
                        Alasan Perubahan
                    </label>

                    <textarea name="alasan"
                              required
                              maxlength="1000"
                              placeholder="Contoh: AC kamar lama rusak"
                              style="width:100%;min-height:70px;padding:8px;margin-bottom:10px;box-sizing:border-box;"></textarea>

                    <button type="submit"
                            style="width:100%;background:#b7791f;"
                            onclick="return confirm('Yakin ingin memindahkan tamu ke kamar baru?')">
                        Simpan Perubahan
                    </button>
                </form>
            @else
                <p style="font-size:12px;color:#667085;margin-top:10px;">
                    Tidak ada kamar pengganti yang sesuai.
                </p>
            @endif
        </details>
    @else
        <form action="{{ route('booking.assignRoom', $booking) }}"
              method="POST">
            @csrf
            @method('PATCH')

            <select name="room_id" required
                    style="width:100%;margin-bottom:8px;">
                <option value="">Pilih nomor kamar</option>

                @foreach ($daftarKamar->where('tipe_kamar', $booking->tipe_kamar)->where('status', '!=', 'perbaikan') as $room)
                    <option value="{{ $room->id }}">
                        {{ $room->nomor_kamar }}
                    </option>
                @endforeach
            </select>

            <button type="submit"
                    style="width:100%;background:#214b3b;">
                Simpan Kamar
            </button>
        </form>
    @endif

    @error('room_id')
        <small style="display:block;color:#b42318;margin-top:6px;">
            {{ $message }}
        </small>
    @enderror

    @error('alasan')
        <small style="display:block;color:#b42318;margin-top:6px;">
            {{ $message }}
        </small>
    @enderror
</td>


<td>{{ $booking->jumlah_tamu }}</td>


            {{-- Status Booking --}}
            <td>
                <form action="{{ route('booking.updateStatus', $booking) }}"
                      method="POST">
                    @csrf
                    @method('PATCH')

                    <select name="status" required>
                        <option value="menunggu"
                            {{ $booking->status == 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>
                        <option value="dikonfirmasi"
                            {{ $booking->status == 'dikonfirmasi' ? 'selected' : '' }}>
                            Dikonfirmasi
                        </option>
                        <option value="dibatalkan"
                            {{ $booking->status == 'dibatalkan' ? 'selected' : '' }}>
                            Dibatalkan
                        </option>
                    </select>

                    <button type="submit" style="background:#1f5f99;">
                        Simpan
                    </button>
                </form>
            </td>

           
{{-- Pembayaran --}}
<td>
    <form action="{{ route('booking.updatePayment', $booking) }}"
          method="POST"
          style="min-width:230px;">
        @csrf
        @method('PATCH')

        <div style="background:#f3f6f4;padding:12px;border-radius:8px;margin-bottom:14px;line-height:1.9;">
            <div>
                <strong>Total Tagihan:</strong><br>
                @if (($booking->harga_per_malam ?? 0) > 0)
                    Rp {{ number_format($booking->total_tagihan, 0, ',', '.') }}
                    <small>({{ $booking->jumlah_malam }} malam)</small>
                @else
                    Harga kamar belum diatur
                @endif
            </div>

            <div>
                <strong>Sudah Dibayar:</strong><br>
                Rp {{ number_format((float) ($booking->jumlah_dibayar ?? 0), 0, ',', '.') }}
            </div>

            <div style="color:#b42318;">
                <strong>Sisa Tagihan:</strong><br>
                Rp {{ number_format($booking->sisa_tagihan ?? 0, 0, ',', '.') }}
            </div>
        </div>

        @php
            $statusPembayaran = $booking->status_pembayaran ?? 'belum_bayar';
        @endphp

        <label style="display:block;margin-bottom:5px;">
            Status Pembayaran (Otomatis)
        </label>

        <div style="background:#f3f6f4;padding:11px;border-radius:7px;margin-bottom:12px;font-weight:600;">
            {{ $statusPembayaran === 'lunas'
                ? 'Lunas'
                : ($statusPembayaran === 'sebagian'
                    ? 'Dibayar Sebagian'
                    : 'Belum Bayar') }}
        </div>

        <label style="display:block;margin-bottom:5px;">
            Metode Pembayaran
        </label>

        <select name="metode_pembayaran"
                style="width:100%;margin-bottom:10px;">
            <option value="">Pilih metode</option>
            <option value="tunai"
                {{ $booking->metode_pembayaran == 'tunai' ? 'selected' : '' }}>
                Tunai
            </option>
            <option value="transfer"
                {{ $booking->metode_pembayaran == 'transfer' ? 'selected' : '' }}>
                Transfer
            </option>
            <option value="qris"
                {{ $booking->metode_pembayaran == 'qris' ? 'selected' : '' }}>
                QRIS
            </option>
            <option value="kartu"
                {{ $booking->metode_pembayaran == 'kartu' ? 'selected' : '' }}>
                Kartu
            </option>
        </select>

        <label style="display:block;margin-bottom:5px;">
            Nominal Pembayaran Baru (Rp)
        </label>

        <input type="number"
               name="jumlah_pembayaran_baru"
               min="1"
               step="0.01"
               required
               value="{{ old('jumlah_pembayaran_baru') }}"
               placeholder="Masukkan nominal transaksi baru"
               style="width:100%;margin-bottom:10px;">

        <button type="submit" style="width:100%;background:#214b3b;">
            Simpan Pembayaran
        </button>
    </form>

    {{-- Riwayat transaksi tetap berada di kolom Pembayaran --}}
    @if ($booking->paymentTransactions->isNotEmpty())
        <details style="margin-top:10px;border:1px solid #dfe7e2;border-radius:7px;padding:8px;">
            <summary style="cursor:pointer;font-size:12px;font-weight:600;color:#214b3b;">
                🧾 Lihat Riwayat ({{ $booking->paymentTransactions->count() }})
            </summary>

            <div style="max-height:130px;overflow-y:auto;margin-top:8px;">
                @foreach ($booking->paymentTransactions as $transaksi)
                    <div style="background:#f8fafc;border:1px solid #e2e8f0;padding:8px;border-radius:6px;margin-bottom:6px;font-size:11px;line-height:1.7;">
                        <strong>
                            Rp {{ number_format((float) $transaksi->jumlah, 0, ',', '.') }}
                        </strong>

                        <div style="color:#667085;">
                            {{ strtoupper($transaksi->metode_pembayaran ?? '-') }}
                            ·
                            {{ $transaksi->tanggal_pembayaran
                                ? $transaksi->tanggal_pembayaran->format('d-m-Y H:i')
                                : '-' }}
                        </div>

                        @if ($transaksi->catatan)
                            <div>Catatan: {{ $transaksi->catatan }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </details>
    @endif
</td>




            {{-- Kuitansi --}}
            <td>
                <a href="{{ route('booking.receipt', $booking) }}"
                   target="_blank"
                   style="display:inline-block;padding:10px 14px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;white-space:nowrap;">
                    🧾 Cetak Kuitansi
                </a>
            </td>

            {{-- Aksi Menginap --}}
            <td style="min-width:190px;">
                @php
                    $statusMenginap = $booking->status_menginap ?? 'belum_checkin';
                @endphp

                @if ($statusMenginap === 'selesai')
                    <div style="color:#214b3b;font-weight:600;">
                        ✅ Selesai Menginap
                    </div>

                    <small>
                        Check-in:
                        {{ $booking->waktu_checkin
                            ? \Illuminate\Support\Carbon::parse($booking->waktu_checkin)->format('d-m-Y H:i')
                            : '-' }}
                    </small>

                    <br>

                    <small>
                        Check-out:
                        {{ $booking->waktu_checkout
                            ? \Illuminate\Support\Carbon::parse($booking->waktu_checkout)->format('d-m-Y H:i')
                            : '-' }}
                    </small>

                @elseif ($statusMenginap === 'sedang_menginap')
                    <div style="color:#214b3b;font-weight:600;margin-bottom:10px;">
                        🏨 Sedang Menginap
                    </div>

                    <form action="{{ route('booking.checkout', $booking) }}"
                          method="POST"
                          onsubmit="return confirm('Catat check-out tamu ini?')">
                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                style="background:#b42318;width:100%;">
                            Check-out Tamu
                        </button>
                    </form>

                @elseif ($booking->status === 'dikonfirmasi')
                    <div style="color:#667085;margin-bottom:10px;">
                        Belum Check-in
                    </div>

                    <form action="{{ route('booking.checkin', $booking) }}"
                          method="POST"
                          onsubmit="return confirm('Catat check-in tamu ini?')">
                        @csrf
                        @method('PATCH')

                        <button type="submit"
                                style="background:#214b3b;width:100%;">
                            Check-in Tamu
                        </button>
                    </form>

                @else
                    <span style="color:#667085;">
                        Konfirmasi booking dahulu
                    </span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="13" style="text-align:center;">
                Belum ada pemesanan.
            </td>
        </tr>
    @endforelse
</tbody>



        </table>
</div>
    </div>


   
 <div class="pagination-container">
        {{ $bookings->links('pagination::simple-tailwind') }}
    </div>



</body>
</html>
