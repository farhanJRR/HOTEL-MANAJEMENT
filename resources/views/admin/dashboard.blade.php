<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ELFAR HOTEL</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6f4;
            color: #24352c;
        }

        .sidebar {
            width: 245px;
            background: #183b2d;
            color: white;
            position: fixed;
            inset: 0 auto 0 0;
            padding: 28px 18px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .brand small {
            display: block;
            font-size: 12px;
            font-weight: normal;
            color: #c5d8cb;
        }

        .menu-title {
            color: #a9c3b3;
            font-size: 11px;
            margin: 35px 10px 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu a {
            display: block;
            padding: 13px 12px;
            color: #e6f0e9;
            text-decoration: none;
            border-radius: 7px;
            margin-bottom: 6px;
        }

        .menu a:hover, .menu a.active {
            background: #2e6048;
            color: white;
        }

        .main {
            margin-left: 245px;
            padding: 32px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            margin: 0 0 8px;
        }

        .muted {
            color: #728078;
            margin: 0;
        }

        .logout {
            background: white;
            color: #214b3b;
            border: 1px solid #d8e2db;
            border-radius: 7px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat {
            background: white;
            padding: 23px;
            border-radius: 12px;
            border: 1px solid #e4ebe6;
        }

        .stat-label {
            color: #718078;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .stat-value {
            font-size: 30px;
            font-weight: bold;
            color: #214b3b;
        }

        .section-title {
            font-size: 20px;
            margin: 0 0 16px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            border: 1px solid #e4ebe6;
            text-decoration: none;
            color: inherit;
            transition: transform .15s, box-shadow .15s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px #183b2d12;
        }

        .icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            background: #e4f0e8;
            color: #214b3b;
            border-radius: 10px;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 17px;
        }

        .card p {
            color: #728078;
            font-size: 13px;
            line-height: 1.6;
            min-height: 42px;
        }

        .card-link {
            display: inline-block;
            color: #286446;
            font-size: 13px;
            font-weight: bold;
            margin-top: 8px;
        }

        .summary {
            background: white;
            border: 1px solid #e4ebe6;
            padding: 23px;
            border-radius: 12px;
            margin-top: 28px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
        }

        .summary-item {
            padding: 15px;
            background: #f5f8f6;
            border-radius: 8px;
        }

        .summary-item span {
            display: block;
            color: #728078;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .summary-item strong {
            font-size: 21px;
        }

        @media (max-width: 1000px) {
            .stats, .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 18px;
            }

            .menu-title {
                margin-top: 18px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 5px;
            }

            .menu a {
                font-size: 13px;
                margin: 0;
            }

            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            .stats, .cards {
                grid-template-columns: 1fr;
            }

            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            h1 {
                font-size: 24px;
            }
        }


:root {
    --green-950: #102b23;
    --green-900: #173d32;
    --green-800: #245744;
    --green-100: #e9f1eb;
    --gold: #c3a16a;
    --page: #f5f7f6;
    --white: #ffffff;
    --ink: #202c27;
    --muted: #7b8780;
    --border: #e5ebe6;
    --shadow: 0 10px 30px rgba(21, 48, 37, .055);
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Inter, "Segoe UI", Arial, sans-serif;
    background: var(--page);
    color: var(--ink);
    line-height: 1.6;
}

.sidebar {
    position: fixed;
    inset: 0 auto 0 0;
    z-index: 10;
    width: 260px;
    padding: 30px 19px;
    overflow-y: auto;
    color: white;
    background: linear-gradient(165deg, #1d4a39 0%, var(--green-950) 100%);
    box-shadow: 8px 0 32px rgba(16, 43, 35, .08);
}

.brand {
    position: relative;
    margin: 0 0 28px;
    padding: 5px 0 23px 59px;
    border-bottom: 1px solid rgba(255,255,255,.13);
    font-size: 19px;
    font-weight: 800;
    letter-spacing: .4px;
}

.brand::before {
    position: absolute;
    top: 4px;
    left: 0;
    display: grid;
    width: 45px;
    height: 45px;
    place-items: center;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 13px;
    background: rgba(255,255,255,.10);
    color: #e3c891;
    content: "EF";
    font-size: 17px;
    letter-spacing: 1px;
}

.brand small {
    display: block;
    margin-top: 3px;
    color: #c0d3c7;
    font-size: 11px;
    font-weight: 400;
    letter-spacing: .2px;
}

.menu-title {
    margin: 25px 10px 12px;
    color: #a8c4b3;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.7px;
    text-transform: uppercase;
}

.menu {
    display: grid;
    gap: 6px;
}

.menu a {
    display: flex;
    align-items: center;
    min-height: 45px;
    margin: 0;
    padding: 11px 13px;
    border: 1px solid transparent;
    border-radius: 10px;
    color: #dce9e1;
    font-size: 13px;
    font-weight: 500;
    line-height: 1.5;
    text-decoration: none;
    transition: background .18s, color .18s, border-color .18s;
}

.menu a:hover {
    border-color: rgba(255,255,255,.08);
    background: rgba(255,255,255,.075);
    color: white;
}

.menu a.active {
    border-color: rgba(255,255,255,.10);
    background: #2b5b46;
    box-shadow: inset 3px 0 0 var(--gold);
    color: white;
    font-weight: 700;
}

.main {
    width: calc(100% - 260px);
    min-height: 100vh;
    margin-left: 260px;
    padding: 34px clamp(22px, 3vw, 46px);
}

header.topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 30px;
    padding: 0 0 25px;
    border-bottom: 1px solid #e3e9e4;
    border-radius: 0;
    background: transparent;
    color: var(--ink);
}

.topbar > div::before {
    display: block;
    margin-bottom: 8px;
    color: #8a987f;
    content: "HOTEL OPERATIONS  /  OVERVIEW";
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.7px;
}

.topbar h1 {
    margin: 0 0 5px;
    color: var(--green-900);
    font-size: clamp(27px, 2.5vw, 35px);
    font-weight: 800;
    letter-spacing: -1.2px;
    line-height: 1.2;
}

.muted {
    margin: 0;
    color: var(--muted);
    font-size: 13px;
}

.logout {
    padding: 10px 17px;
    border: 1px solid #dce5de;
    border-radius: 9px;
    background: white;
    color: var(--green-900);
    cursor: pointer;
    font-size: 12px;
    font-weight: 700;
    transition: .2s;
}

.logout:hover {
    border-color: #b9cdbf;
    background: var(--green-100);
}

.stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 34px;
}

.stat {
    position: relative;
    min-width: 0;
    overflow: hidden;
    padding: 25px 23px;
    border: 1px solid var(--border);
    border-radius: 15px;
    background: var(--white);
    box-shadow: var(--shadow);
    transition: transform .2s, box-shadow .2s;
}

.stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(21, 48, 37, .09);
}

.stat::before {
    position: absolute;
    inset: 0 auto 0 0;
    width: 4px;
    background: var(--green-800);
    content: "";
}

.stat:nth-child(2)::before {
    background: var(--gold);
}

.stat:nth-child(3)::before {
    background: #629783;
}

.stat-label {
    margin-bottom: 12px;
    color: var(--muted);
    font-size: 12px;
    font-weight: 700;
}

.stat-value {
    color: var(--green-900);
    font-size: clamp(30px, 2.7vw, 39px);
    font-weight: 800;
    letter-spacing: -1.2px;
    line-height: 1.2;
    overflow-wrap: anywhere;
}

.section-title {
    margin: 0 0 19px;
    color: var(--green-900);
    font-size: 21px;
    font-weight: 800;
    letter-spacing: -.5px;
}

.cards {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
}

.card {
    display: flex;
    min-width: 0;
    flex-direction: column;
    align-items: flex-start;
    padding: 25px;
    border: 1px solid var(--border);
    border-radius: 15px;
    background: white;
    box-shadow: var(--shadow);
    color: inherit;
    text-decoration: none;
    transition: transform .2s ease, box-shadow .2s ease, border-color .2s;
}

.card:hover {
    transform: translateY(-4px);
    border-color: #cbdacf;
    box-shadow: 0 16px 36px rgba(21, 48, 37, .09);
}

.icon {
    display: grid;
    width: 49px;
    height: 49px;
    place-items: center;
    margin-bottom: 21px;
    border: 1px solid #dce9df;
    border-radius: 14px;
    background: var(--green-100);
    color: var(--green-800);
    font-size: 22px;
}

.card h3 {
    margin: 0 0 8px;
    color: var(--ink);
    font-size: 16px;
    font-weight: 750;
}

.card p {
    min-height: 62px;
    margin: 0;
    color: var(--muted);
    font-size: 12px;
    line-height: 1.8;
}

.card-link {
    display: inline-block;
    margin-top: auto;
    padding-top: 17px;
    color: var(--green-800);
    font-size: 12px;
    font-weight: 800;
}

.summary {
    margin-top: 30px;
    padding: 25px;
    border: 1px solid var(--border);
    border-radius: 15px;
    background: white;
    box-shadow: var(--shadow);
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 13px;
}

.summary-item {
    min-width: 0;
    padding: 18px;
    border: 1px solid #e9eee9;
    border-radius: 11px;
    background: #f8faf8;
}

.summary-item span {
    display: block;
    margin-bottom: 9px;
    color: var(--muted);
    font-size: 11px;
    font-weight: 600;
}

.summary-item strong {
    color: var(--green-900);
    font-size: 25px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.main > section[style*="margin-bottom:25px"] {
    margin-bottom: 30px !important;
    padding: 25px !important;
    border: 1px solid var(--border) !important;
    border-radius: 15px !important;
    box-shadow: var(--shadow);
}

.main > section[style*="margin-bottom:25px"] h2 {
    color: var(--green-900);
    font-size: 19px !important;
    font-weight: 800;
}

.main > section[style*="margin-bottom:25px"] > div > div[style*="margin-bottom:10px"] {
    padding: 17px !important;
    border: 1px solid var(--border) !important;
    border-radius: 11px !important;
    background: #f8faf8 !important;
}

.main > section[style*="margin-bottom:25px"] a {
    display: inline-block;
    border-radius: 8px !important;
    font-weight: 700;
    text-decoration: none;
}

.main > section[style*="margin-bottom:25px"] button {
    font-weight: 700;
}

.main > section:not(.stats):not(.cards):not(.summary) {
    border-radius: 15px;
}

@media (max-width: 1100px) {
    .main {
        padding: 27px 22px;
    }

    .cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .summary-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 760px) {
    .sidebar {
        position: relative;
        width: 100%;
        padding: 19px 16px;
    }

    .brand {
        margin-bottom: 17px;
        padding-bottom: 18px;
    }

    .menu-title {
        margin-top: 17px;
    }

    .menu {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 6px;
    }

    .menu a {
        min-width: 0;
        padding: 10px;
        font-size: 12px;
    }

    .main {
        width: 100%;
        margin-left: 0;
        padding: 23px 16px;
    }

    header.topbar {
        align-items: flex-start;
    }

    .topbar h1 {
        font-size: 28px;
    }

    .stats {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .stat {
        padding: 21px;
    }

    .cards {
        grid-template-columns: 1fr;
        gap: 13px;
    }

    .card {
        padding: 22px;
    }

    .card p {
        min-height: 0;
    }

    .summary {
        padding: 20px;
    }

    .summary-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
    }
}

        
    </style>

    
    
</head>
<body>

<aside class="sidebar">
    <div class="brand">
        ELFAR JUNIOR
        <small>Hotel Management System</small>
    </div>

    <div class="menu-title">Menu Utama</div>

    <nav class="menu">
        <a class="active" href="{{ route('admin.dashboard') }}">▦ Dashboard</a>
        <a href="{{ route('booking.index') }}">▤ Booking</a>
        <a href="{{ route('admin.rooms.index') }}">▣ Manajemen Kamar</a>
        <a href="{{ route('booking.calendar') }}">▦ Kalender Reservasi</a>
        <a href="{{ route('booking.report') }}">▧ Laporan Booking</a>
        <a href="{{ route('booking.revenue') }}">▧ Laporan Pendapatan</a>
    </nav>
</aside>

<main class="main">
    @if (session('success'))
    <div style="background:#d1fae5;color:#065f46;padding:14px 18px;border-radius:8px;margin-bottom:20px;">
        ✅ {{ session('success') }}
    </div>
@endif
    <header class="topbar">
        <div>
            <h1>Dashboard</h1>
            <p class="muted">Selamat datang di panel administrasi StayView 360°.</p>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="logout" type="submit">Keluar ↗</button>
        </form>
    </header>

    
<section style="background:white;padding:22px;border-radius:12px;border:1px solid #e4ebe6;margin-bottom:25px;">

    <div style="display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap;">
       <h2 style="margin:0;font-size:20px;">🔔 Notifikasi Admin</h2>

        <span style="background:#e8eef5;color:#102a43;padding:7px 12px;border-radius:20px;font-size:13px;font-weight:bold;">
            Belum dibaca: {{ $jumlahNotifikasiBelumDibaca }}
        </span>
    </div>

    <div style="margin-top:18px;">

        @forelse ($notifikasi->whereNull('read_at') as $item)
            <div style="padding:14px;margin-bottom:10px;border:1px solid #e4ebe6;border-radius:9px;background:{{ $item->read_at ? '#ffffff' : '#f0f7f2' }};">

                <div style="font-weight:bold;margin-bottom:6px;">
                    {{ $item->data['pesan'] ?? 'Ada notifikasi baru' }}
                </div>

                
<div style="font-size:13px;color:#667085;line-height:1.8;">
    Kode booking:
    <strong>{{ $item->data['kode_booking'] ?? '-' }}</strong>
    <br>

    @if (($item->data['jenis'] ?? 'booking') === 'pembayaran')
        Nominal pembayaran:
        <strong style="color:#176534;">
            Rp {{ number_format((float) ($item->data['nominal_pembayaran'] ?? 0), 0, ',', '.') }}
        </strong>
        <br>

        Metode pembayaran:
        {{ strtoupper($item->data['metode_pembayaran'] ?? '-') }}
        <br>

        Total tagihan:
        Rp {{ number_format((float) ($item->data['total_tagihan'] ?? 0), 0, ',', '.') }}
        <br>

        Total dibayar:
        Rp {{ number_format((float) ($item->data['total_dibayar'] ?? 0), 0, ',', '.') }}
        <br>

        Sisa tagihan:
        <strong>
            Rp {{ number_format((float) ($item->data['sisa_tagihan'] ?? 0), 0, ',', '.') }}
        </strong>
        <br>

        Status pembayaran:
        {{ ($item->data['status_pembayaran'] ?? '') === 'lunas'
            ? 'Lunas'
            : 'Dibayar sebagian' }}
        <br>
    @else
        Check-in: {{ $item->data['tanggal_checkin'] ?? '-' }}
        <br>

        Check-out: {{ $item->data['tanggal_checkout'] ?? '-' }}
        <br>
    @endif

    Diterima:
    {{ $item->created_at->format('d-m-Y H:i') }}
</div>


                <a href="{{ route('booking.index', ['cari' => $item->data['kode_booking'] ?? '']) }}"
                   style="display:inline-block;margin-top:10px;background:#214b3b;color:white;text-decoration:none;padding:8px 12px;border-radius:6px;font-size:13px;">
                    Lihat Booking →
                </a>

                @if (!$item->read_at)
    <form action="{{ route('notifications.read', $item->id) }}"
          method="POST"
          style="margin-top:10px;">
        @csrf
        @method('PATCH')

        <button type="submit"
        style="background:#214b3b;color:white;padding:8px 12px;border:0;border-radius:6px;cursor:pointer;font-size:13px;">
    Tandai Sudah Dibaca
          </button>
    </form>
@endif

            </div>
        @empty
            <p style="color:#667085;margin-bottom:0;">
                Belum ada notifikasi booking baru.
            </p>
        @endforelse

    </div>
</section>


    <section class="stats">
        <div class="stat">
            <div class="stat-label">Total Booking</div>
            <div class="stat-value">{{ $totalBooking }}</div>
        </div>

        <div class="stat">
            <div class="stat-label">Total Kamar</div>
            <div class="stat-value">{{ $totalKamar }}</div>
        </div>

        <div class="stat">
            <div class="stat-label">Kamar Tersedia</div>
            <div class="stat-value">{{ $kamarTersedia }}</div>
        </div>
    </section>

    <h2 class="section-title">Akses Cepat</h2>

    <section class="cards">
        <a class="card" href="{{ route('booking.index') }}">
            <div class="icon">▤</div>
            <h3>Kelola Booking</h3>
            <p>Lihat data tamu, cari reservasi, dan ubah status pemesanan.</p>
            <span class="card-link">Buka booking →</span>
        </a>

        <a class="card" href="{{ route('admin.rooms.index') }}">
            <div class="icon">▣</div>
            <h3>Manajemen Kamar</h3>
            <p>Kelola nomor kamar, tipe kamar, harga, kapasitas, dan status.</p>
            <span class="card-link">Kelola kamar →</span>
        </a>

        <a class="card" href="{{ route('booking.calendar') }}">
            <div class="icon">▦</div>
            <h3>Kalender Reservasi</h3>
            <p>Pantau jadwal tamu menginap berdasarkan tanggal reservasi.</p>
            <span class="card-link">Lihat kalender →</span>
        </a>
    </section>

    <section class="summary">
        <h2 class="section-title">Ringkasan Status Booking</h2>

        <div class="summary-grid">
            <div class="summary-item">
                <span>Menunggu</span>
                <strong>{{ $menunggu }}</strong>
            </div>

            <div class="summary-item">
                <span>Dikonfirmasi</span>
                <strong>{{ $dikonfirmasi }}</strong>
            </div>

            <div class="summary-item">
                <span>Dibatalkan</span>
                <strong>{{ $dibatalkan }}</strong>
            </div>

            <div class="summary-item">
                <span>Total Booking</span>
                <strong>{{ $totalBooking }}</strong>
            </div>
        </div>
    </section>
</main>

</body>
</html>
