<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi Pembayaran - ELFAR HOTEL </title>

    <style>
        
* {
    box-sizing: border-box;
}

:root {
    --emerald: #064e3b;
    --emerald-dark: #022c22;
    --emerald-light: #ecfdf5;
    --gold: #c9a45c;
    --gold-light: #f8f1df;
    --text: #1f2937;
    --muted: #64748b;
    --border: #e2e8f0;
}

body {
    margin: 0;
    padding: 28px;
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f1f5f2;
    color: var(--text);
    line-height: 1.6;
}

.actions {
    display: flex;
    gap: 10px;
    margin: 0 auto 20px;
    max-width: 800px;
    flex-wrap: wrap;
}

.actions a,
.actions button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border: 1px solid transparent;
    border-radius: 9px;
    padding: 11px 18px;
    font: inherit;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: background .2s ease, transform .2s ease;
}

.actions a:hover,
.actions button:hover {
    transform: translateY(-1px);
}

.back {
    color: var(--emerald);
    background: white;
    border-color: #cbd5d1 !important;
}

.back:hover {
    background: var(--emerald-light);
}

.print {
    color: #fff;
    background: var(--emerald);
}

.print:hover {
    background: var(--emerald-dark);
}

.receipt {
    max-width: 800px;
    margin: auto;
    padding: 38px;
    border: 1px solid #e7e9e4;
    border-top: 5px solid var(--gold);
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 18px 45px rgba(2, 44, 34, .09);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding-bottom: 24px;
    border-bottom: 2px solid var(--gold);
}

.brand {
    color: var(--emerald);
    font-size: 25px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.subtitle {
    color: var(--muted);
    font-size: 13px;
    margin-top: 6px;
}

.receipt-title {
    text-align: right;
}

.receipt-title h1 {
    color: var(--emerald);
    font-size: 21px;
    margin: 0 0 8px;
    letter-spacing: .5px;
}

.receipt-title p {
    color: var(--muted);
    font-size: 13px;
    margin: 0;
}

.status {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 7px;
    background: #f1f5f9;
    color: #475569;
    font-size: 12px;
    font-weight: 800;
    border: 1px solid #e2e8f0;
}

.status.lunas {
    background: #dcfce7;
    color: #166534;
    border-color: #bbf7d0;
}

.status.sebagian {
    background: var(--gold-light);
    color: #805d16;
    border-color: #ead7a6;
}

.section-title {
    margin: 28px 0 14px;
    padding-left: 11px;
    border-left: 3px solid var(--gold);
    font-size: 15px;
    font-weight: 800;
    color: var(--emerald);
}

.details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}

.detail {
    padding: 15px;
    border: 1px solid #e8eee9;
    border-radius: 9px;
    background: #f8faf8;
    overflow-wrap: anywhere;
}

.detail span {
    display: block;
    font-size: 12px;
    color: var(--muted);
    margin-bottom: 7px;
}

.detail strong {
    font-size: 14px;
    color: #1e293b;
}

.payment-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.payment-table th,
.payment-table td {
    padding: 13px 10px;
    border-bottom: 1px solid var(--border);
    text-align: left;
    font-size: 14px;
}

.payment-table th {
    background: var(--emerald);
    color: #fff;
    font-weight: 700;
}

.payment-table th:first-child {
    border-radius: 6px 0 0 0;
}

.payment-table th:last-child {
    border-radius: 0 6px 0 0;
}

.payment-table td:last-child,
.payment-table th:last-child {
    text-align: right;
}

.payment-table tbody tr:nth-child(even) {
    background: #f8faf8;
}

.total-row td {
    font-weight: 800;
    color: var(--emerald);
    background: var(--emerald-light);
}

.remaining {
    color: #b42318 !important;
}

.note {
    margin-top: 24px;
    padding: 15px 17px;
    background: #f8f5eb;
    border: 1px solid #efe4c8;
    border-left: 4px solid var(--gold);
    border-radius: 7px;
    color: #57534e;
    font-size: 12px;
    line-height: 1.7;
}

.footer {
    text-align: center;
    border-top: 1px dashed #cbd5e1;
    margin-top: 30px;
    padding-top: 18px;
    color: var(--muted);
    font-size: 12px;
}

@media (max-width: 600px) {
    body {
        padding: 12px;
    }

    .receipt {
        padding: 20px 16px;
        border-radius: 10px;
    }

    .header {
        flex-direction: column;
        gap: 14px;
    }

    .receipt-title {
        text-align: left;
    }

    .details {
        grid-template-columns: 1fr;
    }

    .payment-table th,
    .payment-table td {
        padding: 10px 7px;
        font-size: 12px;
        overflow-wrap: anywhere;
    }

    .actions a,
    .actions button {
        padding: 10px 13px;
    }
}

@media print {
    @page {
        size: A4;
        margin: 15mm;
    }

    body {
        padding: 0;
        background: white;
        color: #111827;
    }

    .actions {
        display: none !important;
    }

    .receipt {
        max-width: none;
        padding: 0;
        border: none;
        border-top: 3px solid var(--gold);
        border-radius: 0;
        box-shadow: none;
    }

    .header,
    .payment-table th,
    .total-row td,
    .status,
    .detail,
    .note {
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }

    .payment-table {
        page-break-inside: auto;
    }

    .payment-table tr {
        page-break-inside: avoid;
    }
}

/* Perbaikan kontras tabel kuitansi */
.details .detail {
    background: #ffffff !important;
    border: 1px solid #e5e7eb;
    color: #1f2937;
}

.detail span {
    color: #64748b !important;
}

.detail strong {
    color: #1f2937 !important;
}

.payment-table {
    background: #ffffff;
}

.payment-table th {
    background: #f1f5f9 !important;
    color: #334155 !important;
    border-bottom: 2px solid #cbd5e1 !important;
}

.payment-table td {
    background: #ffffff !important;
    color: #1f2937 !important;
}

.payment-table tbody tr:nth-child(even) td {
    background: #f8fafc !important;
}

.total-row td {
    background: #fffaf0 !important;
    color: #374151 !important;
    font-weight: 800;
    border-bottom: 2px solid #e8d7ad !important;
}

.remaining {
    color: #b42318 !important;
}

    </style>
</head>
<body>

    <div class="actions">
        <a class="back" href="{{ route('booking.index') }}">
            ← Kembali ke Booking
        </a>

        <button class="print" type="button" onclick="window.print()">
            Cetak Kuitansi
        </button>
    </div>

    <main class="receipt">
        <header class="header">
            <div>
                <div class="brand">STAYVIEW 360°</div>
                <div class="subtitle">Bina Darma Hotel</div>
            </div>

            <div class="receipt-title">
                <h1>BUKTI PEMBAYARAN</h1>
                <p>Kode Booking: <strong>{{ $booking->kode_booking }}</strong></p>
                <p>
                    Dicetak:
                    {{ now()->format('d-m-Y H:i') }}
                </p>
            </div>
        </header>

        <h2 class="section-title">Informasi Tamu</h2>

        <div class="details">
            <div class="detail">
                <span>Nama Tamu</span>
                <strong>{{ $booking->nama }}</strong>
            </div>

            <div class="detail">
                <span>Nomor Telepon</span>
                <strong>{{ $booking->telepon }}</strong>
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
                <span>Check-in</span>
                <strong>{{ $booking->checkin }}</strong>
            </div>

            <div class="detail">
                <span>Check-out</span>
                <strong>{{ $booking->checkout }}</strong>
            </div>
        </div>

        <h2 class="section-title">Rincian Pembayaran</h2>

        <table class="payment-table">
            <tbody>
                <tr>
                    <th>Status Pembayaran</th>
                    <td>
                        @php
                            $statusBayar = $booking->status_pembayaran ?? 'belum_bayar';
                        @endphp

                        <span class="status {{ $statusBayar }}">
                            {{ $statusBayar === 'lunas'
                                ? 'LUNAS'
                                : ($statusBayar === 'sebagian'
                                    ? 'DIBAYAR SEBAGIAN'
                                    : 'BELUM BAYAR') }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td>
                        @php
                            $metodeBayar = [
                                'tunai' => 'Tunai',
                                'transfer' => 'Transfer',
                                'qris' => 'QRIS',
                                'kartu' => 'Kartu',
                            ];
                        @endphp

                        {{ $metodeBayar[$booking->metode_pembayaran ?? ''] ?? 'Belum dicatat' }}
                    </td>
                </tr>

                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td>
                        {{ $booking->tanggal_pembayaran
                            ? \Illuminate\Support\Carbon::parse($booking->tanggal_pembayaran)->format('d-m-Y H:i')
                            : 'Belum ada pembayaran' }}
                    </td>
                </tr>

                <tr>
                    <th>Harga per Malam</th>
                    <td>
                        Rp {{ number_format($hargaKamar, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Lama Menginap</th>
                    <td>{{ $jumlahMalam }} malam</td>
                </tr>

                <tr>
                    <th>Total Tagihan</th>
                    <td>
                        Rp {{ number_format($totalTagihan, 0, ',', '.') }}
                    </td>
                </tr>

                <tr class="total-row">
                    <th>Jumlah Dibayar</th>
                    <td>
                        Rp {{ number_format($jumlahDibayar, 0, ',', '.') }}
                    </td>
                </tr>

                <tr class="total-row">
                    <th>Sisa Tagihan</th>
                    <td class="remaining">
                        Rp {{ number_format($sisaTagihan, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="note">
            Dokumen ini merupakan bukti pencatatan pembayaran berdasarkan
            data yang dimasukkan admin ke sistem StayView 360°.
            Dokumen ini bukan konfirmasi otomatis dari bank atau penyedia
            pembayaran digital.
        </div>

        <footer class="footer">
            StayView 360° · Bina Darma Hotel
            <br>
            Simpan dokumen ini sebagai referensi reservasi dan pembayaran.
        </footer>
    </main>

</body>
</html>
