
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar | StayView 360°</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #243b53;
        }

        header {
            background: #102a43;
            color: white;
            padding: 22px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        header h1 {
            margin: 0;
            font-size: 23px;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #1f5f99;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            opacity: .9;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 4px 16px #102a430c;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #e8edf3;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #486581;
            font-size: 13px;
        }

        .notice {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .empty {
            text-align: center;
            color: #829ab1;
            padding: 30px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #e6f0fa;
            color: #1f5f99;
        }

        .btn-edit {
            background: #e9a23b;
            color: #fff;
        }

        .btn-delete {
            background: #c03935;
        }

        @media (max-width: 600px) {
            .container {
                margin-top: 22px;
                padding: 0 12px;
            }

            header h1 {
                font-size: 19px;
            }

            .card {
                padding: 12px;
            }
        }

/* ===== STAYVIEW 360 — PREMIUM ROOM MANAGEMENT ===== */

:root {
    --room-green: #173f35;
    --room-green-dark: #102f28;
    --room-gold: #c5a15b;
    --room-bg: #f3f6f4;
    --room-border: #e1e9e4;
    --room-text: #253a31;
    --room-muted: #718078;
}

body {
    background:
        radial-gradient(ellipse at top right, #e1eee6 0, transparent 38%),
        var(--room-bg);
    color: var(--room-text);
    font-family: "Segoe UI", Arial, sans-serif;
}

header {
    position: relative;
    padding: 28px 5%;
    background: linear-gradient(120deg, #102f28, #205747) !important;
    border-bottom: 3px solid var(--room-gold);
    box-shadow: 0 8px 28px rgba(16, 47, 40, .13);
}

header h1 {
    font-size: 25px;
    font-weight: 700;
    letter-spacing: -.5px;
}

header a {
    transition: transform .2s, background .2s;
}

header a:hover {
    background: var(--room-green-dark) !important;
    transform: translateY(-1px);
}

.container {
    max-width: 1440px;
    margin: 36px auto;
    padding: 0 28px;
}

.topbar {
    margin-bottom: 24px;
}

.topbar h2,
.topbar h3 {
    color: var(--room-green);
    letter-spacing: -.4px;
}

.btn {
    padding: 11px 17px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 13px;
    transition: transform .2s, box-shadow .2s, filter .2s;
}

.btn:hover {
    opacity: 1;
    filter: brightness(.94);
    transform: translateY(-1px);
    box-shadow: 0 5px 12px rgba(16, 47, 40, .1);
}

.btn:not(.btn-edit):not(.btn-delete) {
    background: var(--room-green);
}

.btn-edit {
    background: #bd9650;
}

.btn-delete {
    background: #b83d3d;
}

.card {
    padding: 24px;
    border: 1px solid var(--room-border);
    border-radius: 18px;
    background: rgba(255, 255, 255, .96);
    box-shadow: 0 10px 30px rgba(23, 63, 53, .055);
}

table {
    border-collapse: separate;
    border-spacing: 0;
    min-width: 750px;
}

th,
td {
    padding: 16px 14px;
    border-bottom: 1px solid #e9efeb;
}

th {
    background: #edf3ef;
    color: var(--room-green);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .6px;
    text-transform: uppercase;
    white-space: nowrap;
}

th:first-child {
    border-radius: 8px 0 0 0;
}

th:last-child {
    border-radius: 0 8px 0 0;
}

td {
    font-size: 13px;
    color: var(--room-text);
    vertical-align: middle;
}

tbody tr {
    transition: background .2s;
}

tbody tr:hover {
    background: #f0f7f2;
}

.status {
    padding: 6px 11px;
    border: 1px solid #d7e8dc;
    border-radius: 20px;
    background: #eaf5ed;
    color: #246340;
    font-weight: 600;
}

.notice {
    border-radius: 12px;
    padding: 15px 18px;
}

.success {
    background: #e8f6ed;
    color: #21643c;
    border: 1px solid #c9e8d3;
}

.empty {
    padding: 44px 24px;
    color: var(--room-muted);
    line-height: 1.8;
}

.container > div:last-child {
    color: var(--room-muted);
}

.container a,
.container button {
    -webkit-tap-highlight-color: transparent;
}

@media (max-width: 768px) {
    header {
        padding: 22px 18px;
    }

    header h1 {
        font-size: 20px;
    }

    .container {
        margin: 24px auto;
        padding: 0 14px;
    }

    .card {
        padding: 12px;
        border-radius: 13px;
    }

    .topbar {
        align-items: flex-start;
    }
}



    </style>
</head>

<body>
<header>
    <h1> ELFAR JUNIOR | Manajemen Kamar</h1>

    <a href="{{ route('booking.index') }}"
   style="display:inline-block;padding:12px 16px;background:#214b3b;color:white;text-decoration:none;border-radius:8px;font-weight:600;">
    ← Kembali ke Booking
   </a>

</header>

<div class="container">

    <div class="topbar">
        <div>
            <h2 style="margin:0 0 8px;">Daftar Kamar</h2>
            <p style="margin:0;color:#627d98;">
                Kelola nomor, tipe, harga, dan status kamar hotel.
            </p>
        </div>

        <a href="{{ route('admin.rooms.create') }}" class="btn">
            + Tambah Kamar
        </a>
    </div>

    @if (session('success'))
        <div class="notice success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="notice"
             style="background:#fee2e2;color:#991b1b;">
            Periksa kembali data yang dimasukkan.
            <ul style="margin-bottom:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nomor Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Harga per Malam</th>
                    <th>Kapasitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $rooms->firstItem() + $loop->index }}</td>
                        <td><strong>{{ $room->nomor_kamar }}</strong></td>
                        <td>{{ $room->tipe_kamar }}</td>
                        <td>
                            Rp{{ number_format($room->harga_per_malam, 0, ',', '.') }}
                        </td>
                        <td>{{ $room->kapasitas }} orang</td>
                        <td>
                            <span class="status">
                                {{ ucfirst($room->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.rooms.edit', $room) }}"
                               class="btn btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('admin.rooms.destroy', $room) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-delete">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty">
                            Belum ada data kamar.
                            Klik "Tambah Kamar" untuk memulai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:22px;">
        {{ $rooms->links('pagination::simple-tailwind') }}
    </div>

</div>
</body>
</html>
