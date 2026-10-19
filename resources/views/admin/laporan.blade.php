<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Booking - ELFAR HOTEL </title>

    <style>
         * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 28px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f5f9;
            color: #243b53;
        }

        .navigation {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 22px;
        }

        .navigation a {
            padding: 12px 16px;
            background: #214b3b;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
        }

        .header {
            background: #102a43;
            color: white;
            padding: 26px;
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #d6e0eb;
        }

        .panel {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 22px;
            box-shadow: 0 4px 16px #102a430c;
        }

        .filter {
            display: flex;
            flex-wrap: wrap;
            align-items: end;
            gap: 14px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        input {
            padding: 11px;
            border: 1px solid #d7dce3;
            border-radius: 7px;
            font: inherit;
        }

        button, .reset {
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            font: inherit;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .primary {
            background: #102a43;
            color: white;
        }

        .print {
            background: #214b3b;
            color: white;
        }

        .reset {
            background: #e5e7eb;
            color: #243044;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 22px;
        }

        .stat {
            background: white;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #102a43;
        }

        .stat span {
            color: #667085;
            font-size: 14px;
        }

        .stat h2 {
            margin: 10px 0 0;
            font-size: 28px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 900px;
        }

        th, td {
            padding: 13px 12px;
            border-bottom: 1px solid #edf0f4;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #102a43;
            color: white;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .menunggu {
            background: #fff2cc;
            color: #8a6116;
        }

        .dikonfirmasi {
            background: #d1fae5;
            color: #065f46;
        }

        .dibatalkan {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            text-align: center;
            padding: 28px;
            color: #667085;
        }

        @media (max-width: 800px) {
            body {
                padding: 15px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .navigation,
            .filter-panel,
            .print,
            .reset {
                display: none !important;
            }

            .header, th {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .panel, .stat {
                box-shadow: none;
            }

            .stats {
                grid-template-columns: repeat(4, 1fr);
            }

            table {
                min-width: 0;
            }

            th, td {
                padding: 7px 5px;
                font-size: 10px;
            }
        }

        
* {
    box-sizing: border-box;
}

:root {
    --green: #173f35;
    --green-dark: #102f28;
    --green-light: #e9f2ec;
    --gold: #c5a15b;
    --page: #f3f6f4;
    --text: #263a31;
    --muted: #718078;
    --border: #e1e9e4;
}

body {
    margin: 0;
    padding: 30px;
    font-family: "Segoe UI", Arial, sans-serif;
    background:
        radial-gradient(ellipse at top right, #e1eee6 0, transparent 38%),
        var(--page);
    color: var(--text);
    line-height: 1.6;
}

.navigation {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
    margin-bottom: 24px;
    padding: 12px;
    border: 1px solid var(--border);
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 5px 20px rgba(23, 63, 53, .04);
}

.navigation a {
    padding: 11px 15px;
    border: 1px solid transparent;
    border-radius: 9px;
    background: var(--green);
    color: white;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s;
}

.navigation a:hover {
    background: var(--green-dark);
    transform: translateY(-1px);
}

.header {
    position: relative;
    overflow: hidden;
    margin-bottom: 24px;
    padding: 32px;
    border: 1px solid rgba(197, 161, 91, .35);
    border-bottom: 3px solid var(--gold);
    border-radius: 18px;
    background: linear-gradient(125deg, #102f28, #245b49);
    color: white;
    box-shadow: 0 12px 30px rgba(16, 47, 40, .12);
}

.header h1 {
    margin: 0 0 8px;
    font-size: clamp(26px, 3vw, 36px);
    font-weight: 800;
    letter-spacing: -.8px;
}

.header p {
    margin: 0;
    color: #d6e5dc;
    font-size: 13px;
}

.panel {
    margin-bottom: 24px;
    padding: 25px;
    border: 1px solid var(--border);
    border-radius: 16px;
    background: #fff;
    box-shadow: 0 9px 28px rgba(23, 63, 53, .05);
}

.panel h2 {
    margin: 0 0 18px;
    color: var(--green);
    font-size: 19px;
    font-weight: 800;
    letter-spacing: -.3px;
}

.filter {
    display: flex;
    flex-wrap: wrap;
    align-items: end;
    gap: 14px;
}

.field {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.field label {
    color: var(--text);
    font-size: 12px;
    font-weight: 700;
}

input {
    min-height: 43px;
    padding: 10px 12px;
    border: 1px solid #d8e3dc;
    border-radius: 9px;
    background: #fff;
    color: var(--text);
    font: inherit;
    font-size: 13px;
    transition: border-color .2s, box-shadow .2s;
}

input:focus {
    outline: none;
    border-color: var(--green);
    box-shadow: 0 0 0 3px rgba(23, 63, 53, .1);
}

button, .reset {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 42px;
    padding: 10px 15px;
    border: 1px solid transparent;
    border-radius: 9px;
    font: inherit;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: transform .2s, filter .2s;
}

button:hover, .reset:hover {
    filter: brightness(.95);
    transform: translateY(-1px);
}

.primary {
    background: var(--green);
    color: white;
}

.print {
    background: var(--gold);
    color: #253328;
}

.reset {
    border-color: var(--border);
    background: #f2f5f3;
    color: var(--green);
}

.stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.stat {
    position: relative;
    overflow: hidden;
    min-width: 0;
    padding: 22px;
    border: 1px solid var(--border);
    border-radius: 14px;
    border-left: 4px solid var(--green);
    background: white;
    box-shadow: 0 8px 24px rgba(23, 63, 53, .045);
    transition: transform .2s, box-shadow .2s;
}

.stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 13px 30px rgba(23, 63, 53, .09);
}

.stat:nth-child(2) {
    border-left-color: #d5a53e;
}

.stat:nth-child(3) {
    border-left-color: #3d9366;
}

.stat:nth-child(4) {
    border-left-color: #c45d5d;
}

.stat span {
    display: block;
    margin-bottom: 12px;
    color: var(--muted);
    font-size: 12px;
    font-weight: 700;
}

.stat h2 {
    margin: 0;
    color: var(--green);
    font-size: clamp(26px, 2.5vw, 34px);
    font-weight: 800;
    letter-spacing: -.8px;
    overflow-wrap: anywhere;
}

.panel > p {
    color: var(--muted);
    font-size: 13px;
}

.panel > p strong {
    color: var(--green);
}

.table-wrap {
    width: 100%;
    overflow-x: auto;
    border: 1px solid var(--border);
    border-radius: 11px;
}

table {
    width: 100%;
    min-width: 900px;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
}

th, td {
    padding: 14px 13px;
    border-bottom: 1px solid #e9efeb;
    text-align: left;
    font-size: 12px;
    vertical-align: middle;
}

th {
    background: var(--green);
    color: white;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .6px;
    text-transform: uppercase;
    white-space: nowrap;
}

tbody tr:last-child td {
    border-bottom: none;
}

tbody tr:nth-child(even) {
    background: #f8faf8;
}

tbody tr:hover {
    background: #edf5f0;
}

.status {
    display: inline-block;
    padding: 6px 10px;
    border: 1px solid transparent;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.menunggu {
    border-color: #f1dfad;
    background: #fff5d9;
    color: #805c00;
}

.dikonfirmasi {
    border-color: #c6e5d0;
    background: #e4f4e9;
    color: #21623b;
}

.dibatalkan {
    border-color: #f0cccc;
    background: #fceaea;
    color: #a52d35;
}

.empty {
    padding: 32px;
    color: var(--muted);
    text-align: center;
}

@media (max-width: 900px) {
    body {
        padding: 18px;
    }

    .stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .panel {
        padding: 18px;
    }
}

@media (max-width: 520px) {
    body {
        padding: 12px;
    }

    .header {
        padding: 23px 18px;
    }

    .navigation {
        padding: 9px;
    }

    .navigation a {
        padding: 9px 11px;
        font-size: 11px;
    }

    .stats {
        gap: 10px;
    }

    .stat {
        padding: 16px;
    }

    .filter {
        align-items: stretch;
    }

    .field,
    .field input,
    .filter button,
    .filter .reset {
        width: 100%;
    }
}

@media print {
    body {
        padding: 0;
        background: white;
        color: #111;
    }

    .navigation,
    .filter-panel,
    .print,
    .reset {
        display: none !important;
    }

    .header {
        padding: 18px;
        box-shadow: none;
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }

    .panel, .stat {
        box-shadow: none;
        break-inside: avoid;
    }

    .stats {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .table-wrap {
        overflow: visible;
        border: none;
    }

    table {
        min-width: 0;
    }

    th, td {
        padding: 7px 5px;
        font-size: 9px;
    }

    th {
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }
}


    </style>
</head>
<body>

    <nav class="navigation">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('booking.index') }}">Booking</a>
        <a href="{{ route('admin.rooms.index') }}">Manajemen Kamar</a>
        <a href="{{ route('booking.calendar') }}">Kalender Reservasi</a>
        <a href="{{ route('booking.revenue') }}">Laporan Pendapatan</a>
    </nav>

    <header class="header">
        <h1>Laporan Booking</h1>
        <p>ELFAR HOTEL </p>
    </header>

    <section class="panel filter-panel">
        <h2>Filter Periode Laporan</h2>

        <form action="{{ route('booking.report') }}" method="GET" class="filter">
            <div class="field">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input
                    type="date"
                    id="tanggal_mulai"
                    name="tanggal_mulai"
                    value="{{ $tanggalMulai }}"
                    required
                >
            </div>

            <div class="field">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input
                    type="date"
                    id="tanggal_akhir"
                    name="tanggal_akhir"
                    value="{{ $tanggalAkhir }}"
                    min="{{ $tanggalMulai }}"
                    required
                >
            </div>

            <button type="submit" class="primary">Tampilkan Laporan</button>

            <a href="{{ route('booking.report') }}" class="reset">Reset</a>

            <button type="button" class="print" onclick="window.print()">
                Cetak Laporan
            </button>
        </form>
    </section>

    <section class="stats">
        <div class="stat">
            <span>Total Booking</span>
            <h2>{{ $totalBooking }}</h2>
        </div>

        <div class="stat">
            <span>Menunggu</span>
            <h2>{{ $menunggu }}</h2>
        </div>

        <div class="stat">
            <span>Dikonfirmasi</span>
            <h2>{{ $dikonfirmasi }}</h2>
        </div>

        <div class="stat">
            <span>Dibatalkan</span>
            <h2>{{ $dibatalkan }}</h2>
        </div>
    </section>

    <section class="panel">
        <h2>Data Reservasi</h2>

        <p>
            Periode:
            <strong>{{ $tanggalMulai }}</strong>
            sampai
            <strong>{{ $tanggalAkhir }}</strong>
        </p>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Booking</th>
                        <th>Nama Tamu</th>
                        <th>Telepon</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Tipe Kamar</th>
                        <th>Jumlah Tamu</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->kode_booking }}</td>
                            <td>{{ $booking->nama }}</td>
                            <td>{{ $booking->telepon }}</td>
                            <td>{{ $booking->checkin }}</td>
                            <td>{{ $booking->checkout }}</td>
                            <td>{{ $booking->tipe_kamar }}</td>
                            <td>{{ $booking->jumlah_tamu }}</td>
                            <td>
                                <span class="status {{ $booking->status }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
                                Tidak ada booking pada periode ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</body>
</html>
