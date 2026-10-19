<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Reservasi - ELFAR HOTEL </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px;
            background: #f3f6f4;
            color: #26352d;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        h1 {
            margin: 0 0 8px;
            color: #214b3b;
        }

        .subtitle {
            color: #68756d;
            margin: 0;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 7px;
            background: #214b3b;
            color: white;
            text-decoration: none;
        }

        .calendar-box {
            padding: 22px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 15px #0000000a;
        }

        .calendar-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .calendar-nav button {
            padding: 9px 14px;
            border: 0;
            border-radius: 6px;
            background: #e2ebe5;
            color: #214b3b;
            cursor: pointer;
            font-size: 16px;
        }

        #monthTitle {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .weekdays, .calendar {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 6px;
        }

        .weekday {
            text-align: center;
            padding: 10px 0;
            font-weight: bold;
            color: #53655a;
        }

        .day {
            min-height: 105px;
            padding: 8px;
            border: 1px solid #e4eae6;
            border-radius: 7px;
            background: #fff;
            overflow-wrap: anywhere;
        }

        .day.empty {
            background: #f8faf9;
        }

        .day.today {
            border: 2px solid #438263;
        }

        .day-number {
            font-weight: bold;
            margin-bottom: 7px;
        }

        .booking-count {
    margin-top: 8px;
    padding: 6px 4px;
    border-radius: 5px;
    background: #e8f0eb;
    color: #214b3b;
    font-size: 11px;
    text-align: center;
}

        .availability-summary {
    margin-top: 6px;
    padding: 4px;
    border-radius: 4px;
    background: #d9f3e3;
    color: #17663b;
    font-size: 10px;
    line-height: 1.4;
}

.repair-summary {
    margin-top: 4px;
    padding: 4px;
    border-radius: 4px;
    background: #dedbfa;
    color: #51459b;
    font-size: 10px;
    line-height: 1.4;
}

        .event {
            margin-top: 5px;
            padding: 5px;
            border-radius: 5px;
            font-size: 11px;
            line-height: 1.4;
        }

        .event.menunggu {
            background: #fff1c7;
            color: #805c00;
        }

        .event.dikonfirmasi {
            background: #d9f3e3;
            color: #17663b;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 18px;
            color: #53655a;
            font-size: 13px;
        }

        .legend span {
            padding: 6px 9px;
            border-radius: 5px;
        }

        .detail {
            margin-top: 22px;
            padding: 16px;
            background: #f8faf9;
            border-radius: 8px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .calendar-box {
                padding: 10px;
            }

            .weekdays, .calendar {
                gap: 3px;
            }

            .weekday {
                font-size: 11px;
            }

            .day {
                min-height: 75px;
                padding: 4px;
            }

            .event {
                font-size: 9px;
                padding: 3px;
            }

            #monthTitle {
                font-size: 16px;
            }
        }

        .detail-table-wrap {
    width: 100%;
    overflow-x: auto;
    margin-top: 12px;
}

.detail-table {
    width: 100%;
    min-width: 480px;
    border-collapse: collapse;
    background: white;
}

.detail-table th,
.detail-table td {
    padding: 10px;
    border: 1px solid #e2e8e4;
    text-align: left;
    font-size: 13px;
}

.detail-table th {
    background: #214b3b;
    color: white;
}

.kamar-penuh {
    color: #b71c1c;
    font-weight: bold;
}



/* ===== STAYVIEW 360 — PREMIUM RESERVATION CALENDAR ===== */
:root {
    --cal-green: #173f35;
    --cal-green-dark: #102f28;
    --cal-gold: #c5a15b;
    --cal-bg: #f3f6f4;
    --cal-border: #e1e9e4;
    --cal-text: #253a31;
    --cal-muted: #718078;
}

body {
    padding: 32px;
    background:
        radial-gradient(ellipse at top right, #e1eee6 0, transparent 38%),
        var(--cal-bg);
    color: var(--cal-text);
    font-family: "Segoe UI", Arial, sans-serif;
    line-height: 1.5;
}

.container {
    max-width: 1440px;
}

.header {
    padding: 30px 32px;
    margin-bottom: 26px;
    border: 1px solid rgba(197, 161, 91, .35);
    border-bottom: 3px solid var(--cal-gold);
    border-radius: 18px;
    background: linear-gradient(125deg, #102f28, #245b49);
    box-shadow: 0 12px 30px rgba(16, 47, 40, .12);
}

.header h1 {
    margin-bottom: 8px;
    color: #fff;
    font-size: clamp(25px, 3vw, 34px);
    letter-spacing: -.7px;
}

.subtitle {
    color: #d6e5dc;
    font-size: 14px;
}

.button {
    padding: 12px 18px;
    border: 1px solid rgba(255, 255, 255, .28);
    border-radius: 10px;
    background: var(--cal-gold);
    color: #192d23;
    font-size: 13px;
    font-weight: 700;
    transition: transform .2s, filter .2s;
}

.button:hover {
    filter: brightness(1.06);
    transform: translateY(-2px);
}

.calendar-box {
    padding: 26px;
    border: 1px solid var(--cal-border);
    border-radius: 20px;
    background: rgba(255, 255, 255, .96);
    box-shadow: 0 12px 36px rgba(23, 63, 53, .06);
}

.calendar-nav {
    margin-bottom: 24px;
}

.calendar-nav button {
    min-width: 44px;
    min-height: 40px;
    padding: 10px 16px;
    border: 1px solid #dce7e0;
    border-radius: 10px;
    background: #edf4ef;
    color: var(--cal-green);
    font-weight: 700;
    transition: background .2s, transform .2s;
}

.calendar-nav button:hover {
    background: #dcebe1;
    transform: translateY(-1px);
}

#monthTitle {
    color: var(--cal-green);
    font-size: clamp(18px, 2vw, 24px);
    letter-spacing: -.4px;
}

.weekdays,
.calendar {
    gap: 8px;
}

.weekday {
    padding: 12px 2px;
    border-radius: 8px;
    background: #edf3ef;
    color: var(--cal-green);
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
}

.day {
    min-height: 125px;
    padding: 10px;
    border: 1px solid var(--cal-border);
    border-radius: 12px;
    background: #fff;
    transition: border-color .2s, background .2s, box-shadow .2s;
}

.day:not(.empty):hover {
    border-color: #9ab9a6;
    background: #fbfdfb;
    box-shadow: 0 4px 12px rgba(23, 63, 53, .06);
}

.day.empty {
    border-color: transparent;
    background: #f6f8f6;
}

.day.today {
    border: 2px solid var(--cal-gold);
    background: #fffdf6;
    box-shadow: inset 0 0 0 1px rgba(197, 161, 91, .1);
}

.day-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 28px;
    min-height: 28px;
    margin-bottom: 5px;
    border-radius: 8px;
    color: var(--cal-green);
    font-size: 13px;
}

.day.today .day-number {
    background: var(--cal-green);
    color: white;
}

.booking-count,
.availability-summary,
.repair-summary,
.event {
    border-radius: 7px;
    font-weight: 600;
    overflow-wrap: anywhere;
}

.booking-count {
    padding: 7px 5px;
    background: #edf3ef;
    color: var(--cal-green);
    font-size: 11px;
    text-align: center;
}

.availability-summary {
    padding: 6px;
    background: #e5f4e9;
    color: #21623b;
    font-size: 10px;
    line-height: 1.5;
}

.repair-summary {
    padding: 6px;
    background: #efebff;
    color: #58449a;
    font-size: 10px;
    line-height: 1.5;
}

.event {
    padding: 7px;
    font-size: 11px;
    line-height: 1.5;
}

.event.menunggu {
    border-left: 3px solid #d6a33d;
    background: #fff5d9;
    color: #785400;
}

.event.dikonfirmasi {
    border-left: 3px solid #38835a;
    background: #e4f4e9;
    color: #205d39;
}

.legend {
    gap: 10px;
    margin-top: 22px;
    color: var(--cal-muted);
}

.legend span {
    padding: 8px 12px;
    border: 1px solid var(--cal-border);
    border-radius: 9px;
    background: #fff;
    font-size: 12px;
}

.detail {
    margin-top: 26px;
    padding: 22px;
    border: 1px solid var(--cal-border);
    border-radius: 16px;
    background: #f8faf8;
}

.detail-table {
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden;
    border: 1px solid var(--cal-border);
    border-radius: 10px;
}

.detail-table th {
    padding: 13px;
    border-color: #315a4b;
    background: var(--cal-green);
    font-size: 11px;
    letter-spacing: .4px;
    text-transform: uppercase;
}

.detail-table td {
    padding: 13px;
    border-color: #e6ede8;
    color: var(--cal-text);
}

.detail-table tr:nth-child(even) td {
    background: #f7faf8;
}

.kamar-penuh {
    color: #b42332;
    font-weight: 800;
}

@media (max-width: 768px) {
    body {
        padding: 14px;
    }

    .header {
        padding: 22px 18px;
        border-radius: 14px;
    }

    .calendar-box {
        padding: 12px;
        border-radius: 14px;
    }

    .weekdays,
    .calendar {
        gap: 3px;
    }

    .weekday {
        padding: 8px 0;
        font-size: 9px;
    }

    .day {
        min-height: 85px;
        padding: 4px;
        border-radius: 7px;
    }

    .day-number {
        min-width: 22px;
        min-height: 22px;
        font-size: 11px;
    }

    .booking-count,
    .availability-summary,
    .repair-summary {
        padding: 3px 2px;
        font-size: 9px;
    }

    .event {
        padding: 4px 3px;
        font-size: 9px;
    }

    .legend {
        gap: 6px;
    }

    .legend span {
        padding: 6px 8px;
        font-size: 11px;
    }

    .detail {
        padding: 12px;
    }
}




    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <h1>Kalender Reservasi</h1>
            <p class="subtitle">ELFAR JUNIOR — jadwal check-in dan check-out</p>
        </div>

        <a class="button" href="{{ route('booking.index') }}">
            ← Kembali ke Booking
        </a>
    </div>

    <div class="calendar-box">
        <div class="calendar-nav">
            <button id="prevMonth" type="button">←</button>
            <div id="monthTitle"></div>
            <button id="nextMonth" type="button">→</button>
        </div>

        <div class="weekdays">
            <div class="weekday">Min</div>
            <div class="weekday">Sen</div>
            <div class="weekday">Sel</div>
            <div class="weekday">Rab</div>
            <div class="weekday">Kam</div>
            <div class="weekday">Jum</div>
            <div class="weekday">Sab</div>
        </div>

        <div class="calendar" id="calendar"></div>

        <div class="legend">
            <span style="background:#fff1c7;color:#805c00;">Menunggu</span>
            <span style="background:#d9f3e3;color:#17663b;">Dikonfirmasi</span>
        </div>

        <div class="detail" id="detail">
            Klik tanggal yang memiliki reservasi untuk melihat detail.
        </div>
    </div>
</div>



<script>

const bookings = {{ Illuminate\Support\Js::from(
    $bookings->map(fn ($booking) => [
        'kode' => $booking->kode_booking,
        'nama' => $booking->nama,
        'telepon' => $booking->telepon,
        'checkin' => $booking->checkin,
        'checkout' => $booking->checkout,
        'tipe' => $booking->tipe_kamar,
        'jumlah_tamu' => $booking->jumlah_tamu,
        'status' => $booking->status,
        'status_pembayaran' => $booking->status_pembayaran,
        'jumlah_dibayar' => $booking->jumlah_dibayar,
        'metode_pembayaran' => $booking->metode_pembayaran,
        'status_menginap' => $booking->status_menginap,
    ])->values()
) }};

const rooms = {{ Illuminate\Support\Js::from(
    $rooms->map(fn ($room) => [
        'tipe' => $room->tipe_kamar,
        'status' => $room->status,
    ])->values()
) }};

const calendar = document.getElementById('calendar');
const monthTitle = document.getElementById('monthTitle');
const detail = document.getElementById('detail');

let currentDate = new Date();

const tipeKamarList = [
    'Standard',
    'Deluxe Double',
    'Deluxe Twin',
    'Suite'
];

function dateKey(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}

function getDailyBookings(key) {
    return bookings.filter(booking =>
        key >= booking.checkin && key < booking.checkout
    );
}

function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    monthTitle.textContent = new Date(year, month, 1)
        .toLocaleDateString('id-ID', {
            month: 'long',
            year: 'numeric'
        });

    calendar.innerHTML = '';

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const todayKey = dateKey(new Date());

    for (let i = 0; i < firstDay; i++) {
        const empty = document.createElement('div');
        empty.className = 'day empty';
        calendar.appendChild(empty);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day);
        const key = dateKey(date);

        const cell = document.createElement('div');
        cell.className = 'day';
        cell.style.cursor = 'pointer';

        if (key === todayKey) {
            cell.classList.add('today');
        }

        const number = document.createElement('div');
        number.className = 'day-number';
        number.textContent = day;
        cell.appendChild(number);

        const dailyBookings = getDailyBookings(key);

        const count = document.createElement('div');
        count.className = 'booking-count';
        count.textContent = `${dailyBookings.length} booking`;
        cell.appendChild(count);

        cell.addEventListener('click', () => {
            showDetails(key);
        });

        calendar.appendChild(cell);
    }
}

function showDetails(key) {
    detail.innerHTML = '';

    const heading = document.createElement('h3');
    heading.textContent = `Detail Ketersediaan — ${key}`;
    detail.appendChild(heading);

    const dailyBookings = getDailyBookings(key);

    // Tabel ketersediaan kamar
    const availabilityTitle = document.createElement('h3');
    availabilityTitle.textContent = 'Ketersediaan Kamar';
    detail.appendChild(availabilityTitle);

    const availabilityTable = document.createElement('table');
    availabilityTable.className = 'detail-table';

    function addHeader(table, labels) {
        const thead = document.createElement('thead');
        const row = document.createElement('tr');

        labels.forEach(label => {
            const th = document.createElement('th');
            th.textContent = label;
            row.appendChild(th);
        });

        thead.appendChild(row);
        table.appendChild(thead);
    }

    addHeader(availabilityTable, [
        'Tipe Kamar',
        'Kamar Aktif',
        'Booking',
        'Tersedia',
        'Perbaikan'
    ]);

    const availabilityBody = document.createElement('tbody');

    tipeKamarList.forEach(tipe => {
        const tipeRooms = rooms.filter(room => room.tipe === tipe);

        const activeRooms = tipeRooms.filter(
            room => room.status !== 'perbaikan'
        ).length;

        const repairs = tipeRooms.filter(
            room => room.status === 'perbaikan'
        ).length;

        const booked = dailyBookings.filter(
            booking => booking.tipe === tipe
        ).length;

        const available = Math.max(0, activeRooms - booked);

        const row = document.createElement('tr');

        [tipe, activeRooms, booked, available, repairs].forEach(
            (value, index) => {
                const td = document.createElement('td');
                td.textContent = value;

                if (index === 3 && available === 0) {
                    td.className = 'kamar-penuh';
                }

                row.appendChild(td);
            }
        );

        availabilityBody.appendChild(row);
    });

    availabilityTable.appendChild(availabilityBody);

    const availabilityWrap = document.createElement('div');
    availabilityWrap.className = 'detail-table-wrap';
    availabilityWrap.appendChild(availabilityTable);
    detail.appendChild(availabilityWrap);

    // Tabel daftar reservasi
    const reservationTitle = document.createElement('h3');
    reservationTitle.textContent = 'Daftar Reservasi';
    detail.appendChild(reservationTitle);

    const reservationTable = document.createElement('table');
    reservationTable.className = 'detail-table';

    addHeader(reservationTable, [
        'Kode Booking',
        'Nama Tamu',
        'Tipe Kamar',
        'Status'
    ]);

    const reservationBody = document.createElement('tbody');

    if (dailyBookings.length === 0) {
        const row = document.createElement('tr');
        const td = document.createElement('td');

        td.colSpan = 4;
        td.textContent = 'Tidak ada booking aktif pada tanggal ini.';

        row.appendChild(td);
        reservationBody.appendChild(row);
    } else {
        
dailyBookings.forEach(booking => {
    const row = document.createElement('tr');
    row.style.cursor = 'pointer';
    row.title = 'Klik untuk melihat detail booking';

    [
        booking.kode,
        booking.nama,
        booking.tipe,
        booking.status
    ].forEach((value, index) => {
        const td = document.createElement('td');
        td.textContent = value;

        if (index === 3) {
            td.style.fontWeight = 'bold';

            if (booking.status === 'menunggu') {
                td.style.color = '#805c00';
            } else if (booking.status === 'dikonfirmasi') {
                td.style.color = '#17663b';
            }
        }

        row.appendChild(td);
    });

    row.addEventListener('click', () => {
        showBookingDetail(booking);
    });

    reservationBody.appendChild(row);
});

    }

    reservationTable.appendChild(reservationBody);

    const reservationWrap = document.createElement('div');
    reservationWrap.className = 'detail-table-wrap';
    reservationWrap.appendChild(reservationTable);
    detail.appendChild(reservationWrap);
    const panel = document.createElement('div');
panel.id = 'selectedBookingDetail';
panel.className = 'detail';
panel.style.display = 'none';
detail.appendChild(panel);
}


function showBookingDetail(booking) {
    const panel = document.getElementById('selectedBookingDetail');

    if (!panel) return;

    panel.innerHTML = '';
    panel.style.display = 'block';

    const heading = document.createElement('h3');
    heading.textContent = `Detail Booking: ${booking.kode}`;
    panel.appendChild(heading);

    const table = document.createElement('table');
    table.className = 'detail-table';

    const tbody = document.createElement('tbody');

    const info = [
        ['Kode Booking', booking.kode],
        ['Nama Tamu', booking.nama],
        ['Nomor Telepon', booking.telepon || '-'],
        ['Tipe Kamar', booking.tipe],
        ['Check-in', booking.checkin],
        ['Check-out', booking.checkout],
        ['Jumlah Tamu', `${booking.jumlah_tamu ?? '-'} orang`],
        ['Status Booking', booking.status],
        ['Status Pembayaran', booking.status_pembayaran || 'belum_bayar'],
        [
            'Jumlah Dibayar',
            'Rp ' + Number(booking.jumlah_dibayar || 0).toLocaleString('id-ID')
        ],
        ['Metode Pembayaran', booking.metode_pembayaran || '-'],
        ['Status Menginap', booking.status_menginap || 'belum_checkin']
    ];

    info.forEach(([label, value]) => {
        const row = document.createElement('tr');

        const th = document.createElement('th');
        th.textContent = label;

        const td = document.createElement('td');
        td.textContent = value;

        row.appendChild(th);
        row.appendChild(td);
        tbody.appendChild(row);
    });

    table.appendChild(tbody);

    const wrap = document.createElement('div');
    wrap.className = 'detail-table-wrap';
    wrap.appendChild(table);

    panel.appendChild(wrap);
}


document.getElementById('prevMonth').addEventListener('click', () => {
    currentDate = new Date(
        currentDate.getFullYear(),
        currentDate.getMonth() - 1,
        1
    );

    renderCalendar();
});

document.getElementById('nextMonth').addEventListener('click', () => {
    currentDate = new Date(
        currentDate.getFullYear(),
        currentDate.getMonth() + 1,
        1
    );

    renderCalendar();
});

renderCalendar();
</script>


</body>
</html>
