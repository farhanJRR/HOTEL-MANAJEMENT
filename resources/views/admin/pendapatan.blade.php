<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan - ELFAR HOTEL </title>

    <style>
        
* {
    box-sizing: border-box;
}

:root {
    --green: #064e3b;
    --green-dark: #022c22;
    --green-light: #d1fae5;
    --gold: #c9a45c;
    --gold-light: #f8f1df;
    --bg: #f4f7f5;
    --white: #ffffff;
    --text: #1f2937;
    --muted: #6b7280;
    --border: #e2e8e5;
    --shadow: 0 8px 24px rgba(2, 44, 34, 0.07);
}

body {
    margin: 0;
    padding: 30px;
    font-family: "Segoe UI", Arial, sans-serif;
    background: var(--bg);
    color: var(--text);
    line-height: 1.6;
}

nav {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 24px;
    padding: 12px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 16px;
    box-shadow: var(--shadow);
}

nav a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 16px;
    border-radius: 10px;
    background: transparent;
    color: var(--green);
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    transition: background .2s ease, color .2s ease;
}

nav a:hover,
nav a:focus-visible {
    background: var(--green);
    color: var(--white);
}

header {
    position: relative;
    overflow: hidden;
    margin-bottom: 24px;
    padding: 34px;
    border: 1px solid rgba(201, 164, 92, .4);
    border-radius: 20px;
    background: linear-gradient(125deg, var(--green-dark), var(--green));
    color: var(--white);
    box-shadow: var(--shadow);
}

header::after {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    right: -45px;
    top: -65px;
    border: 24px solid rgba(201, 164, 92, .15);
    border-radius: 50%;
    pointer-events: none;
}

header h1 {
    position: relative;
    z-index: 1;
    margin: 0 0 8px;
    font-size: clamp(25px, 4vw, 34px);
    letter-spacing: -.5px;
}

header p {
    position: relative;
    z-index: 1;
    margin: 0;
    color: #d1fae5;
}

section {
    min-width: 0;
    margin: 24px 0;
    padding: 26px;
    overflow: hidden;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 18px;
    box-shadow: var(--shadow);
}

section h2 {
    margin-top: 0;
    color: var(--green);
    font-size: 21px;
}

section h3 {
    color: var(--green);
}

input,
select,
button,
.reset {
    max-width: 100%;
    padding: 11px 13px;
    border: 1px solid #d5ded9;
    border-radius: 9px;
    font: inherit;
}

input,
select {
    background: var(--white);
    color: var(--text);
}

input:focus,
select:focus {
    outline: 2px solid rgba(6, 78, 59, .18);
    border-color: var(--green);
}

button,
.reset {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 0;
    cursor: pointer;
    text-decoration: none;
    font-weight: 700;
    transition: transform .2s ease, filter .2s ease;
}

button:hover,
.reset:hover {
    filter: brightness(1.08);
    transform: translateY(-1px);
}

button {
    background: var(--green);
    color: var(--white);
}

.reset {
    background: #edf2ef;
    color: var(--green);
}

.print {
    background: var(--gold);
    color: var(--green-dark);
}

.amount {
    position: relative;
    border: 1px solid rgba(201, 164, 92, .45);
    border-left: 5px solid var(--gold);
    background: linear-gradient(135deg, #fff, #fbfcfa);
}

.amount p {
    color: var(--muted);
}

.amount h2 {
    margin: 8px 0 12px;
    color: var(--green);
    font-size: clamp(27px, 4vw, 36px);
    overflow-wrap: anywhere;
}

.amount .note,
.note {
    color: var(--muted);
    font-size: 13px;
}

.table-wrap {
    width: 100%;
    overflow-x: auto;
    border: 1px solid var(--border);
    border-radius: 12px;
}

table {
    width: 100%;
    min-width: 850px;
    border-collapse: separate;
    border-spacing: 0;
    background: var(--white);
}

th,
td {
    padding: 14px 16px;
    text-align: left;
    vertical-align: middle;
    border-bottom: 1px solid var(--border);
}

th {
    background: var(--green);
    color: var(--white);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .35px;
    white-space: nowrap;
}

td {
    font-size: 14px;
}

tbody tr:last-child td {
    border-bottom: 0;
}

tbody tr:hover {
    background: #f3faf6;
}

td:first-child {
    color: var(--green);
    font-weight: 600;
}

@media (max-width: 768px) {
    body {
        padding: 16px;
    }

    nav {
        gap: 7px;
        padding: 9px;
    }

    nav a {
        padding: 9px 11px;
        font-size: 12px;
    }

    header,
    section {
        padding: 20px;
        border-radius: 14px;
    }

    header {
        padding: 26px 22px;
    }

    section h2 {
        font-size: 19px;
    }

    .amount h2 {
        font-size: 28px;
    }
}

@media (max-width: 420px) {
    body {
        padding: 10px;
    }

    nav a {
        flex: 1 1 auto;
    }

    header,
    section {
        padding: 16px;
    }
}

@media print {
    body {
        padding: 0;
        background: white;
        color: black;
    }

    nav,
    .print,
    a[href*="export"] {
        display: none !important;
    }

    header,
    th {
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }

    header,
    section {
        box-shadow: none;
        break-inside: avoid;
    }

    section {
        border: 1px solid #ddd;
    }

    .table-wrap {
        overflow: visible;
    }

    table {
        min-width: 0;
        font-size: 10px;
    }

    th,
    td {
        padding: 7px;
    }
}

    </style>
</head>
<body>

<nav>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('booking.index') }}">Booking</a>
    <a href="{{ route('admin.rooms.index') }}">Manajemen Kamar</a>
    <a href="{{ route('booking.calendar') }}">Kalender Reservasi</a>
    <a href="{{ route('booking.report') }}">Laporan Booking</a>
</nav>

<header>
    <h1>Laporan Pendapatan</h1>
    <p>ELFAR HOTEL</p>
</header>


<div style="display:flex;justify-content:flex-end;margin:18px 0;">
    <a href="{{ route('booking.revenue.export', [
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_akhir' => $tanggalAkhir
        ]) }}"
       style="display:inline-flex;align-items:center;gap:8px;background:#214b3b;color:white;text-decoration:none;padding:12px 18px;border-radius:8px;font-weight:600;">
        ↓ Export Excel (.xlsx)
    </a>
</div>



<section style="margin:24px 0;background:#fff;padding:22px;border-radius:12px;min-width:0;overflow:hidden;">
    <h2 style="color:#214b3b;margin:0 0 8px;">
        Analitik Pendapatan dan Reservasi
    </h2>
    <p style="color:#728078;margin:0 0 22px;">
        Pantau pendapatan aktual, tren tahunan, dan kamar terpopuler.
    </p>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr));gap:20px;min-width:0;">

        <!-- GRAFIK 1: PENDAPATAN AKTUAL -->
        <div style="padding:18px;border:1px solid #e4ebe6;border-radius:12px;min-width:0;overflow:hidden;">
            <h3 style="margin:0 0 8px;">Pendapatan Aktual</h3>
            <p style="color:#728078;font-size:13px;margin:0 0 12px;">
                Filter tanggal dan kelompok waktu pendapatan.
            </p>

            <form action="{{ route('booking.revenue') }}" method="GET"
                  style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;margin:12px 0 18px;">

                <input type="hidden" name="tanggal_mulai" value="{{ $tanggalMulai }}">
                <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                <input type="hidden" name="grafik_tahunan_mulai" value="{{ $grafikTahunanMulai }}">
                <input type="hidden" name="grafik_tahunan_akhir" value="{{ $grafikTahunanAkhir }}">
                <input type="hidden" name="grafik_kamar_mulai" value="{{ $grafikKamarMulai }}">
                <input type="hidden" name="grafik_kamar_akhir" value="{{ $grafikKamarAkhir }}">
                <input type="hidden" name="grafik_status_mulai" value="{{ $grafikStatusMulai }}">
                <input type="hidden" name="grafik_status_akhir" value="{{ $grafikStatusAkhir }}">

                <label style="font-size:12px;min-width:0;">
                    Dari tanggal
                    <input type="date" name="grafik_pendapatan_mulai"
                           value="{{ $grafikPendapatanMulai }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>

                <label style="font-size:12px;min-width:0;">
                    Sampai tanggal
                    <input type="date" name="grafik_pendapatan_akhir"
                           value="{{ $grafikPendapatanAkhir }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>

                <label style="font-size:12px;grid-column:1/-1;">
                    Kelompok waktu
                    <select name="grafik_pendapatan_granularitas"
                            style="display:block;width:100%;box-sizing:border-box;padding:9px;margin-top:5px;">
                        <option value="harian" @selected($granularitasPendapatan === 'harian')>Harian</option>
                        <option value="mingguan" @selected($granularitasPendapatan === 'mingguan')>Mingguan</option>
                        <option value="bulanan" @selected($granularitasPendapatan === 'bulanan')>Bulanan</option>
                        <option value="tahunan" @selected($granularitasPendapatan === 'tahunan')>Tahunan</option>
                    </select>
                </label>

                <button type="submit"
                        style="grid-column:1/-1;width:100%;padding:10px;background:#214b3b;color:white;border:0;border-radius:7px;">
                    Terapkan Filter Pendapatan
                </button>
            </form>

            <div style="position:relative;width:100%;height:280px;min-width:0;">
                <canvas id="grafikPendapatan"></canvas>
            </div>
        </div>

        <!-- GRAFIK 2: PENDAPATAN PER TAHUN -->
        <div style="padding:18px;border:1px solid #e4ebe6;border-radius:12px;min-width:0;overflow:hidden;">
            <h3 style="margin:0 0 8px;">Pendapatan per Tahun</h3>
            <p style="color:#728078;font-size:13px;margin:0 0 12px;">
                Atur periode grafik tahunan secara terpisah.
            </p>

            <form action="{{ route('booking.revenue') }}" method="GET"
                  style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;margin:12px 0 18px;">

                <input type="hidden" name="tanggal_mulai" value="{{ $tanggalMulai }}">
                <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                <input type="hidden" name="grafik_pendapatan_mulai" value="{{ $grafikPendapatanMulai }}">
                <input type="hidden" name="grafik_pendapatan_akhir" value="{{ $grafikPendapatanAkhir }}">
                <input type="hidden" name="grafik_pendapatan_granularitas" value="{{ $granularitasPendapatan }}">
                <input type="hidden" name="grafik_kamar_mulai" value="{{ $grafikKamarMulai }}">
                <input type="hidden" name="grafik_kamar_akhir" value="{{ $grafikKamarAkhir }}">
                <input type="hidden" name="grafik_status_mulai" value="{{ $grafikStatusMulai }}">
                <input type="hidden" name="grafik_status_akhir" value="{{ $grafikStatusAkhir }}">

                <label style="font-size:12px;min-width:0;">
                    Dari tanggal
                    <input type="date" name="grafik_tahunan_mulai"
                           value="{{ $grafikTahunanMulai }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>

                <label style="font-size:12px;min-width:0;">
                    Sampai tanggal
                    <input type="date" name="grafik_tahunan_akhir"
                           value="{{ $grafikTahunanAkhir }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>


<label style="font-size:12px;grid-column:1/-1;">
    Kelompok waktu
    <select name="grafik_tahunan_granularitas"
            style="display:block;width:100%;box-sizing:border-box;padding:9px;margin-top:5px;">
        <option value="harian" @selected($granularitasTahunan === 'harian')>Harian</option>
        <option value="mingguan" @selected($granularitasTahunan === 'mingguan')>Mingguan</option>
        <option value="bulanan" @selected($granularitasTahunan === 'bulanan')>Bulanan</option>
        <option value="tahunan" @selected($granularitasTahunan === 'tahunan')>Tahunan</option>
    </select>
</label>

                <button type="submit"
                        style="grid-column:1/-1;width:100%;padding:10px;background:#214b3b;color:white;border:0;border-radius:7px;">
                    Terapkan Filter Tahunan
                </button>
            </form>

            <div style="position:relative;width:100%;height:280px;min-width:0;">
                <canvas id="grafikPendapatanTahunan"></canvas>
            </div>
        </div>

        <!-- GRAFIK 3: TIPE KAMAR TERPOPULER -->
        <div style="padding:18px;border:1px solid #e4ebe6;border-radius:12px;min-width:0;overflow:hidden;">
            <h3 style="margin:0 0 8px;">Tipe Kamar Terpopuler</h3>
            <p style="color:#728078;font-size:13px;margin:0 0 12px;">
                Hitung reservasi per tipe kamar berdasarkan periode.
            </p>

            <form action="{{ route('booking.revenue') }}" method="GET"
                  style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;margin:12px 0 18px;">

                <input type="hidden" name="tanggal_mulai" value="{{ $tanggalMulai }}">
                <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                <input type="hidden" name="grafik_pendapatan_mulai" value="{{ $grafikPendapatanMulai }}">
                <input type="hidden" name="grafik_pendapatan_akhir" value="{{ $grafikPendapatanAkhir }}">
                <input type="hidden" name="grafik_pendapatan_granularitas" value="{{ $granularitasPendapatan }}">
                <input type="hidden" name="grafik_tahunan_mulai" value="{{ $grafikTahunanMulai }}">
                <input type="hidden" name="grafik_tahunan_akhir" value="{{ $grafikTahunanAkhir }}">
                <input type="hidden" name="grafik_status_mulai" value="{{ $grafikStatusMulai }}">
                <input type="hidden" name="grafik_status_akhir" value="{{ $grafikStatusAkhir }}">

                <label style="font-size:12px;min-width:0;">
                    Dari tanggal
                    <input type="date" name="grafik_kamar_mulai"
                           value="{{ $grafikKamarMulai }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>

                <label style="font-size:12px;min-width:0;">
                    Sampai tanggal
                    <input type="date" name="grafik_kamar_akhir"
                           value="{{ $grafikKamarAkhir }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>
<label style="font-size:12px;grid-column:1/-1;">
    Kelompok waktu
    <select name="grafik_kamar_granularitas"
            style="display:block;width:100%;box-sizing:border-box;padding:9px;margin-top:5px;">
        <option value="harian" @selected($granularitasKamar === 'harian')>Harian</option>
        <option value="mingguan" @selected($granularitasKamar === 'mingguan')>Mingguan</option>
        <option value="bulanan" @selected($granularitasKamar === 'bulanan')>Bulanan</option>
        <option value="tahunan" @selected($granularitasKamar === 'tahunan')>Tahunan</option>
    </select>
</label>
                <button type="submit"
                        style="grid-column:1/-1;width:100%;padding:10px;background:#214b3b;color:white;border:0;border-radius:7px;">
                    Terapkan Filter Kamar
                </button>
            </form>

            <div style="position:relative;width:100%;height:280px;min-width:0;">
                <canvas id="grafikTipeKamar"></canvas>
            </div>
        </div>

        <!-- GRAFIK 4: STATUS BOOKING -->
        <div style="padding:18px;border:1px solid #e4ebe6;border-radius:12px;min-width:0;overflow:hidden;">
            <h3 style="margin:0 0 8px;">Status Booking</h3>
            <p style="color:#728078;font-size:13px;margin:0 0 12px;">
                Lihat pembagian status reservasi berdasarkan periode.
            </p>

            <form action="{{ route('booking.revenue') }}" method="GET"
                  style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;margin:12px 0 18px;">

                <input type="hidden" name="tanggal_mulai" value="{{ $tanggalMulai }}">
                <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                <input type="hidden" name="grafik_pendapatan_mulai" value="{{ $grafikPendapatanMulai }}">
                <input type="hidden" name="grafik_pendapatan_akhir" value="{{ $grafikPendapatanAkhir }}">
                <input type="hidden" name="grafik_pendapatan_granularitas" value="{{ $granularitasPendapatan }}">
                <input type="hidden" name="grafik_tahunan_mulai" value="{{ $grafikTahunanMulai }}">
                <input type="hidden" name="grafik_tahunan_akhir" value="{{ $grafikTahunanAkhir }}">
                <input type="hidden" name="grafik_kamar_mulai" value="{{ $grafikKamarMulai }}">
                <input type="hidden" name="grafik_kamar_akhir" value="{{ $grafikKamarAkhir }}">

                <label style="font-size:12px;min-width:0;">
                    Dari tanggal
                    <input type="date" name="grafik_status_mulai"
                           value="{{ $grafikStatusMulai }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>

                <label style="font-size:12px;min-width:0;">
                    Sampai tanggal
                    <input type="date" name="grafik_status_akhir"
                           value="{{ $grafikStatusAkhir }}" required
                           style="display:block;width:100%;min-width:0;max-width:100%;box-sizing:border-box;padding:8px;margin-top:5px;">
                </label>
<label style="font-size:12px;grid-column:1/-1;">
    Kelompok waktu
    <select name="grafik_status_granularitas"
            style="display:block;width:100%;box-sizing:border-box;padding:9px;margin-top:5px;">
        <option value="harian" @selected($granularitasStatus === 'harian')>Harian</option>
        <option value="mingguan" @selected($granularitasStatus === 'mingguan')>Mingguan</option>
        <option value="bulanan" @selected($granularitasStatus === 'bulanan')>Bulanan</option>
        <option value="tahunan" @selected($granularitasStatus === 'tahunan')>Tahunan</option>
    </select>
</label>
                <button type="submit"
                        style="grid-column:1/-1;width:100%;padding:10px;background:#214b3b;color:white;border:0;border-radius:7px;">
                    Terapkan Filter Status
                </button>
            </form>

            <div style="position:relative;width:100%;height:280px;min-width:0;">
                <canvas id="grafikStatusBooking"></canvas>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Chart === 'undefined') {
        console.error('Chart.js gagal dimuat. Periksa koneksi internet.');
        return;
    }

    const pendapatan = @json($grafikPendapatan);
    const tahunan = @json($grafikPendapatanTahunan);
    const tipeKamar = @json($grafikTipeKamar);
    const statusBooking = @json($grafikStatusBooking);

    function buatGrafik(id, tipe, labels, values, judul, formatRupiah) {
    const canvas = document.getElementById(id);
    if (!canvas) return;

    new Chart(canvas, {
        type: tipe,
        data: {
            labels: labels,
            datasets: [{
                label: judul,
                data: values,
                tension: 0.3,
                fill: tipe === 'line',
                borderWidth: 2,
                backgroundColor: tipe === 'line'
                    ? 'rgba(33,75,59,0.15)'
                    : [
                        '#214b3b',
                        '#c49b60',
                        '#4382c4',
                        '#b7791f',
                        '#8b6bb1',
                        '#4b9b91'
                    ],
                borderColor: '#214b3b',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: tipe === 'doughnut'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const value = context.parsed.y ?? context.parsed;

                            return formatRupiah
                                ? 'Rp ' + new Intl.NumberFormat('id-ID').format(value)
                                : context.label + ': ' + value;
                        }
                    }
                }
            },
            scales: tipe === 'doughnut' ? {} : {
                x: {
                    ticks: {
                        autoSkip: true,
                        maxTicksLimit: 6,
                        maxRotation: 0,
                        minRotation: 0,
                        callback: function (value) {
                            const label = String(this.getLabelForValue(value));
                            const pemisah = label.lastIndexOf(' · ');

                            if (pemisah !== -1) {
                                const namaKamar = label.slice(pemisah + 3);
                                let periode = label.slice(0, pemisah);

                                if (periode.includes(' - ')) {
                                    periode = periode.split(' - ')[0];
                                }

                                return [namaKamar, periode];
                            }

                            if (label.includes(' - ')) {
                                return label.split(' - ')[0];
                            }

                            return label;
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return formatRupiah
                                ? 'Rp ' + new Intl.NumberFormat('id-ID', {
                                    notation: 'compact',
                                    maximumFractionDigits: 1
                                }).format(value)
                                : value;
                        }
                    }
                }
            }
        }
    });
}

    buatGrafik(
        'grafikPendapatan',
        'bar',
        pendapatan.map(x => x.label),
        pendapatan.map(x => Number(x.total)),
        'Pendapatan',
        true
    );

    buatGrafik(
        'grafikPendapatanTahunan',
        'line',
        tahunan.map(x => x.label),
        tahunan.map(x => Number(x.total)),
        'Pendapatan Tahunan',
        true
    );

    buatGrafik(
        'grafikTipeKamar',
        'bar',
        tipeKamar.map(x => x.label),
        tipeKamar.map(x => Number(x.jumlah)),
        'Jumlah Booking',
        false
    );

    const statusPerPeriode = {};

statusBooking.forEach(item => {
    const pemisah = item.label.lastIndexOf(' · ');

    const periode = pemisah >= 0
        ? item.label.slice(0, pemisah)
        : item.label;

    const status = pemisah >= 0
        ? item.label.slice(pemisah + 3)
        : '';

    if (!statusPerPeriode[periode]) {
        statusPerPeriode[periode] = {
            Menunggu: 0,
            Dikonfirmasi: 0,
            Dibatalkan: 0
        };
    }

    if (Object.hasOwn(statusPerPeriode[periode], status)) {
        statusPerPeriode[periode][status] = Number(item.jumlah);
    }
});

const labelStatus = Object.keys(statusPerPeriode);

new Chart(document.getElementById('grafikStatusBooking'), {
    type: 'line',

    data: {
        labels: labelStatus,
        datasets: [
            {
                label: 'Menunggu',
                data: labelStatus.map(p => statusPerPeriode[p].Menunggu),
                borderColor: '#c49b60',
                backgroundColor: '#c49b60',
                tension: 0.3
            },
            {
                label: 'Dikonfirmasi',
                data: labelStatus.map(p => statusPerPeriode[p].Dikonfirmasi),
                borderColor: '#214b3b',
                backgroundColor: '#214b3b',
                tension: 0.3
            },
            {
                label: 'Dibatalkan',
                data: labelStatus.map(p => statusPerPeriode[p].Dibatalkan),
                borderColor: '#c94c4c',
                backgroundColor: '#c94c4c',
                tension: 0.3
            }
        ]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            mode: 'index',
            intersect: false
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            },
            x: {
                ticks: {
                    autoSkip: true,
                    maxTicksLimit: 8,
                    maxRotation: 0
                }
            }
        }
    }
});
});
</script>



<section class="amount">
    <p>Estimasi Nilai Reservasi Dikonfirmasi</p>
    <h2>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h2>
    <p>Total reservasi dikonfirmasi: <strong>{{ $totalBooking }}</strong></p>
    <p class="note">
        Dihitung dari harga kamar per malam dikalikan lama menginap.
        Ini bukan bukti pembayaran atau pendapatan yang sudah diterima.
    </p>
</section>


<section class="amount">
    <p>Total Pembayaran Tercatat</p>
    <h2>Rp {{ number_format($totalDibayar, 0, ',', '.') }}</h2>
    <p class="note">
        Jumlah pembayaran yang dicatat untuk reservasi dikonfirmasi
        dalam periode laporan.
    </p>
</section>



<section>
    <h2>Rincian Reservasi</h2>

    <p class="note">
        Periode {{ $tanggalMulai }} sampai {{ $tanggalAkhir }}
    </p>

    <p class="note">
        Menampilkan {{ $bookings->total() > 0 ? $bookings->firstItem() : 0 }}
        –{{ $bookings->lastItem() ?? 0 }}
        dari {{ $bookings->total() }} reservasi
    </p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Kode Booking</th>
                    <th>Nama Tamu</th>
                    <th>Tipe Kamar</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Malam</th>
                    <th>Harga/Malam</th>
                    <th>Estimasi Nilai</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->kode_booking }}</td>
                        <td>{{ $booking->nama }}</td>
                        <td>{{ $booking->tipe_kamar }}</td>
                        <td>{{ $booking->checkin }}</td>
                        <td>{{ $booking->checkout }}</td>
                        <td>{{ $booking->jumlah_malam }}</td>

                        <td>
                            @if ($booking->harga_per_malam > 0)
                                Rp {{ number_format($booking->harga_per_malam, 0, ',', '.') }}
                            @else
                                Harga belum diatur
                            @endif
                        </td>

                        <td>
                            @if ($booking->harga_per_malam > 0)
                                Rp {{ number_format($booking->estimasi_pendapatan, 0, ',', '.') }}
                            @else
                                Belum tersedia
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;padding:24px;">
                            Tidak ada reservasi dikonfirmasi dalam periode ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($bookings->hasPages())
        <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-top:20px;">

            <span class="note">
                Halaman {{ $bookings->currentPage() }}
                dari {{ $bookings->lastPage() }}
            </span>

            <div style="display:flex;align-items:center;gap:10px;">
                @if ($bookings->onFirstPage())
                    <span style="padding:10px 14px;border:1px solid #ddd;border-radius:7px;color:#999;">
                        ← Sebelumnya
                    </span>
                @else
                    <a href="{{ $bookings->previousPageUrl() }}"
                       style="padding:10px 14px;background:#214b3b;color:white;text-decoration:none;border-radius:7px;">
                        ← Sebelumnya
                    </a>
                @endif

                @if ($bookings->hasMorePages())
                    <a href="{{ $bookings->nextPageUrl() }}"
                       style="padding:10px 14px;background:#214b3b;color:white;text-decoration:none;border-radius:7px;">
                        Berikutnya →
                    </a>
                @else
                    <span style="padding:10px 14px;border:1px solid #ddd;border-radius:7px;color:#999;">
                        Berikutnya →
                    </span>
                @endif
            </div>
        </div>
    @endif
</section>

</body>
</html>
