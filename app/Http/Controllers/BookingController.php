<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\BookingBaruNotification;
use App\Models\PaymentTransaction;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceivedMail;
use App\Exports\RevenueReportExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller

{  
    





public function index(Request $request)
{
    $query = Booking::with('paymentTransactions');

    if ($request->filled('cari')) {
        $cari = $request->cari;

        $query->where(function ($q) use ($cari) {
            $q->where('nama', 'like', '%' . $cari . '%')
              ->orWhere('kode_booking', 'like', '%' . $cari . '%');
        });
    }
    
    if ($request->filled('status') && $request->status !== 'semua') {
    $query->where('status', $request->status);
}


    $bookings = (clone $query)->latest()->paginate(10)->withQueryString();
    
$hargaKamar = Room::select('tipe_kamar', 'harga_per_malam')
    ->get()
    ->groupBy('tipe_kamar')
    ->map(fn ($rooms) => (float) $rooms->first()->harga_per_malam);

$bookings->getCollection()->transform(function ($booking) use ($hargaKamar) {
    $checkin = \Illuminate\Support\Carbon::parse($booking->checkin);
    $checkout = \Illuminate\Support\Carbon::parse($booking->checkout);

    $malam = max(0, (int) $checkin->diffInDays($checkout));
    $harga = (float) $hargaKamar->get($booking->tipe_kamar, 0);
    $totalTagihan = $harga * $malam;
    $sudahDibayar = (float) ($booking->jumlah_dibayar ?? 0);

    $booking->jumlah_malam = $malam;
    $booking->harga_per_malam = $harga;
    $booking->total_tagihan = $totalTagihan;
    $booking->sisa_tagihan = max(0, $totalTagihan - $sudahDibayar);

    return $booking;
});


    $totalBooking = Booking::count();
    $menunggu = Booking::where('status', 'menunggu')->count();
    $dikonfirmasi = Booking::where('status', 'dikonfirmasi')->count();
    $dibatalkan = Booking::where('status', 'dibatalkan')->count();


$daftarKamar = Room::orderBy('tipe_kamar')
    ->orderBy('nomor_kamar')
    ->get([
        'id',
        'nomor_kamar',
        'tipe_kamar',
        'status',
    ]);

    return view('admin.booking', compact(
    'bookings',
    'daftarKamar',
    'totalBooking',
    'menunggu',
    'dikonfirmasi',
    'dibatalkan'
));
}



public function calendar()
{
    // Ambil booking yang masih aktif
    $bookings = Booking::whereIn('status', [
        'menunggu',
        'dikonfirmasi',
    ])
        ->orderBy('checkin')
       
->get([
    'id',
    'kode_booking',
    'nama',
    'telepon',
    'checkin',
    'checkout',
    'tipe_kamar',
    'jumlah_tamu',
    'status',
    'status_pembayaran',
    'jumlah_dibayar',
    'metode_pembayaran',
    'status_menginap',
]);


    // Ambil data tipe dan status seluruh kamar
    $rooms = Room::get([
        'tipe_kamar',
        'status',
    ]);

    return view('admin.kalender', compact(
        'bookings',
        'rooms'
    ));
}







public function updateStatus(Request $request, Booking $booking)
{
    $data = $request->validate([
        'status' => 'required|in:menunggu,dikonfirmasi,dibatalkan',
    ]);

    $statusSebelumnya = $booking->status;

    \Log::info('Status booking debug email', [
    'booking_id' => $booking->id,
    'status_sebelumnya' => $statusSebelumnya,
    'status_diminta' => $data['status'],
    'email_tamu' => $booking->email,
]);

    $booking->update($data);

    // Email dikirim hanya ketika status berubah menjadi dikonfirmasi.
    if (
        $data['status'] === 'dikonfirmasi'
        && $statusSebelumnya !== 'dikonfirmasi'
    ) {
        if (empty($booking->email)) {
            return redirect()
                ->route('booking.index')
                ->with(
                    'success',
                    'Status booking diperbarui, tetapi email tamu belum tersedia.'
                );
        }

        try {
            Mail::to($booking->email)->send(
                new BookingConfirmedMail($booking->fresh())
            );

            return redirect()
                ->route('booking.index')
                ->with(
                    'success',
                    'Booking berhasil dikonfirmasi dan email konfirmasi telah dikirim.'
                );
        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->route('booking.index')
                ->with(
                    'success',
                    'Status booking berhasil diperbarui, tetapi email gagal dikirim. Periksa konfigurasi SMTP.'
                );
        }
    }

    return redirect()
        ->route('booking.index')
        ->with('success', 'Status booking berhasil diperbarui!');
}



    
public function store(Request $request)
{
    // 1. Validasi data booking
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telepon' => 'required|string|max:30',
        'checkin' => 'required|date|after_or_equal:today',
        'checkout' => 'required|date|after:checkin',
        'tipe_kamar' => 'required|in:Standard,Deluxe Double,Deluxe Twin,Suite',
        'jumlah_tamu' => 'required|integer|min:1|max:4',
    ]);

    try {
        // 2. Periksa ketersediaan dan buat booking
        $booking = DB::transaction(function () use ($data) {

            // Hitung kamar yang tidak sedang diperbaiki
            $jumlahKamar = Room::where(
                'tipe_kamar',
                $data['tipe_kamar']
            )
                ->where('status', '!=', 'perbaikan')
                ->count();

            if ($jumlahKamar === 0) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'tipe_kamar' => 'Tipe kamar ini belum tersedia atau semua kamarnya sedang dalam perbaikan.',
                ]);
            }

            // Hitung booking yang tanggalnya bertumpang tindih
            $jumlahBooking = Booking::where(
                'tipe_kamar',
                $data['tipe_kamar']
            )
                ->whereIn('status', ['menunggu', 'dikonfirmasi'])
                ->where('checkin', '<', $data['checkout'])
                ->where('checkout', '>', $data['checkin'])
                ->count();

            if ($jumlahBooking >= $jumlahKamar) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'tipe_kamar' => 'Maaf, kamar tidak tersedia pada tanggal yang dipilih. Silakan pilih tanggal atau tipe kamar lain.',
                ]);
            }

            // Buat kode booking yang unik
            do {
                $kode = 'SV-' . strtoupper(Str::random(8));
            } while (Booking::where('kode_booking', $kode)->exists());

            // Simpan booking
            return Booking::create([
                ...$data,
                'kode_booking' => $kode,
                'status' => 'menunggu',
            ]);
        }, 3);

    } catch (\Illuminate\Database\QueryException $e) {
        report($e);

        return back()
            ->withInput()
            ->withErrors([
                'tipe_kamar' => 'Pemesanan belum dapat diproses. Silakan coba kembali.',
            ]);
    }

    // 3. Kirim notifikasi kepada admin
    User::query()->get()->each(function (User $user) use ($booking) {
        $user->notify(new BookingBaruNotification($booking));
    });

    // 4. Tampilkan pesan berhasil
    return redirect('/')
        ->with(
            'booking_success',
            'Pemesanan berhasil dicatat! Kode booking kamu: '
                . $booking->kode_booking
        );
}


    public function report(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $tanggalMulai = $request->input(
            'tanggal_mulai',
            now()->startOfMonth()->toDateString()
        );

        $tanggalAkhir = $request->input(
            'tanggal_akhir',
            now()->endOfMonth()->toDateString()
        );

     
    // Filter grafik pendapatan.
    $grafikPendapatanMulai = $request->input(
        'grafik_pendapatan_mulai',
        $tanggalMulai
    );

    $grafikPendapatanAkhir = $request->input(
        'grafik_pendapatan_akhir',
        $tanggalAkhir
    );

    $granularitasPendapatan = $request->input(
        'grafik_pendapatan_granularitas',
        'harian'
    );

    // Pertahankan variabel lama jika masih digunakan oleh Blade.
    $granularitas = $granularitasPendapatan;

    // Filter grafik pendapatan tahunan.
    $grafikTahunanMulai = $request->input(
        'grafik_tahunan_mulai',
        now()->subYears(4)->startOfYear()->toDateString()
    );

    $grafikTahunanAkhir = $request->input(
        'grafik_tahunan_akhir',
        now()->toDateString()
    );

    // Filter grafik tipe kamar.
    $grafikKamarMulai = $request->input(
        'grafik_kamar_mulai',
        $tanggalMulai
    );

    $grafikKamarAkhir = $request->input(
        'grafik_kamar_akhir',
        $tanggalAkhir
    );

    // Filter grafik status booking.
    $grafikStatusMulai = $request->input(
        'grafik_status_mulai',
        $tanggalMulai
    );

    $grafikStatusAkhir = $request->input(
        'grafik_status_akhir',
        $tanggalAkhir
    );
   

        $bookings = Booking::whereDate('checkin', '>=', $tanggalMulai)
            ->whereDate('checkin', '<=', $tanggalAkhir)
            ->orderBy('checkin')
            ->get();

        $totalBooking = $bookings->count();

        $menunggu = $bookings->where('status', 'menunggu')->count();

        $dikonfirmasi = $bookings->where('status', 'dikonfirmasi')->count();

        $dibatalkan = $bookings->where('status', 'dibatalkan')->count();

        return view('admin.laporan', compact(
            'bookings',
            'tanggalMulai',
            'tanggalAkhir',
            'totalBooking',
            'menunggu',
            'dikonfirmasi',
            'dibatalkan'
        ));
    }

  public function exportRevenue(Request $request)
{
    $request->validate([
        'tanggal_mulai' => 'nullable|date',
        'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_mulai',
    ]);

    $tanggalMulai = $request->input(
        'tanggal_mulai',
        now()->startOfMonth()->toDateString()
    );

    $tanggalAkhir = $request->input(
        'tanggal_akhir',
        now()->endOfMonth()->toDateString()
    );

    $namaFile = 'laporan-pendapatan-'
        . $tanggalMulai . '-'
        . $tanggalAkhir . '.xlsx';

    return Excel::download(
        new RevenueReportExport($tanggalMulai, $tanggalAkhir),
        $namaFile
    );
} 
    


public function revenue(Request $request)
{
    $request->validate([

    
        'tanggal_mulai' => 'nullable|date',
        'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_mulai',

        'grafik_pendapatan_mulai' => 'nullable|date',
        'grafik_pendapatan_akhir' => 'nullable|date|after_or_equal:grafik_pendapatan_mulai',
        'grafik_pendapatan_granularitas' => 'nullable|in:harian,mingguan,bulanan,tahunan',

        'grafik_tahunan_mulai' => 'nullable|date',
        'grafik_tahunan_akhir' => 'nullable|date|after_or_equal:grafik_tahunan_mulai',

        'grafik_tahunan_granularitas' => 'nullable|in:harian,mingguan,bulanan,tahunan',
'grafik_kamar_granularitas' => 'nullable|in:harian,mingguan,bulanan,tahunan',
'grafik_status_granularitas' => 'nullable|in:harian,mingguan,bulanan,tahunan',

        'grafik_kamar_mulai' => 'nullable|date',
        'grafik_kamar_akhir' => 'nullable|date|after_or_equal:grafik_kamar_mulai',

        'grafik_status_mulai' => 'nullable|date',
        'grafik_status_akhir' => 'nullable|date|after_or_equal:grafik_status_mulai',
    ]);

    // Periode utama untuk laporan rincian reservasi.
    $tanggalMulai = $request->input(
        'tanggal_mulai',
        now()->startOfMonth()->toDateString()
    );

    $tanggalAkhir = $request->input(
        'tanggal_akhir',
        now()->endOfMonth()->toDateString()
    );
        $tanggalMulai = $request->input(
        'tanggal_mulai',
        now()->startOfMonth()->toDateString()
    );

    $tanggalAkhir = $request->input(
        'tanggal_akhir',
        now()->endOfMonth()->toDateString()
    );

    
    // Filter tanggal grafik pendapatan
    $grafikPendapatanMulai = $request->input(
        'grafik_pendapatan_mulai',
        $tanggalMulai
    );

    $grafikPendapatanAkhir = $request->input(
        'grafik_pendapatan_akhir',
        $tanggalAkhir
    );

    $granularitasPendapatan = $request->input(
        'grafik_pendapatan_granularitas',
        $request->input('granularitas', 'harian')
    );

    // Kompatibilitas dengan dropdown lama jika masih digunakan
    $granularitas = $granularitasPendapatan;

    // Filter grafik pendapatan tahunan
    $grafikTahunanMulai = $request->input(
        'grafik_tahunan_mulai',
        now()->subYears(4)->startOfYear()->toDateString()
    );

    $grafikTahunanAkhir = $request->input(
        'grafik_tahunan_akhir',
        now()->toDateString()
    );

    // Filter grafik tipe kamar
    $grafikKamarMulai = $request->input(
        'grafik_kamar_mulai',
        $tanggalMulai
    );

    $grafikKamarAkhir = $request->input(
        'grafik_kamar_akhir',
        $tanggalAkhir
    );

    // Filter grafik status booking
    $grafikStatusMulai = $request->input(
        'grafik_status_mulai',
        $tanggalMulai
    );

    $grafikStatusAkhir = $request->input(
        'grafik_status_akhir',
        $tanggalAkhir
    );

    $granularitasTahunan = $request->input(
    'grafik_tahunan_granularitas',
    'tahunan'
);

$granularitasKamar = $request->input(
    'grafik_kamar_granularitas',
    'mingguan'
);

$granularitasStatus = $request->input(
    'grafik_status_granularitas',
    'mingguan'
);

    // Data reservasi untuk laporan pendapatan utama.
    $hargaKamar = Room::pluck('harga_per_malam', 'tipe_kamar');

    $bookings = Booking::where('status', 'dikonfirmasi')
        ->whereDate('checkin', '>=', $tanggalMulai)
        ->whereDate('checkin', '<=', $tanggalAkhir)
        ->orderBy('checkin')
        ->get()
        ->map(function ($booking) use ($hargaKamar) {
            $checkin = \Illuminate\Support\Carbon::parse(
                $booking->checkin
            );

            $checkout = \Illuminate\Support\Carbon::parse(
                $booking->checkout
            );

            $jumlahMalam = max(
                0,
                (int) $checkin->diffInDays($checkout)
            );

            $hargaPerMalam = (float) (
                $hargaKamar[$booking->tipe_kamar] ?? 0
            );

            $booking->estimasi_pendapatan = round(
                $hargaPerMalam * $jumlahMalam,
                2
            );

            return $booking;
        });

    // Ringkasan laporan utama.
    $totalBooking = $bookings->count();

    $totalPendapatan = $bookings->sum(
        'estimasi_pendapatan'
    );

    $totalDibayar = $bookings->sum(
        'jumlah_dibayar'
    );
    
    // GRAFIK 1: Pendapatan berdasarkan tanggal dan granularitasnya sendiri.
    $transaksiDalamPeriode = DB::table('payment_transactions')
        ->whereDate('tanggal_pembayaran', '>=', $grafikPendapatanMulai)
        ->whereDate('tanggal_pembayaran', '<=', $grafikPendapatanAkhir)
        ->get(['jumlah', 'tanggal_pembayaran']);

    $awal = \Illuminate\Support\Carbon::parse($grafikPendapatanMulai)->startOfDay();
    $akhir = \Illuminate\Support\Carbon::parse($grafikPendapatanAkhir)->startOfDay();

    $totalPerPeriode = [];

    foreach ($transaksiDalamPeriode as $transaksi) {
        $tanggalTransaksi = \Illuminate\Support\Carbon::parse(
            $transaksi->tanggal_pembayaran
        );

        $kunci = match ($granularitasPendapatan) {
            'harian' => $tanggalTransaksi->toDateString(),
            'mingguan' => $tanggalTransaksi->copy()
                ->startOfWeek(\Illuminate\Support\Carbon::MONDAY)
                ->toDateString(),
            'bulanan' => $tanggalTransaksi->format('Y-m'),
            'tahunan' => $tanggalTransaksi->format('Y'),
        };

        $totalPerPeriode[$kunci] =
            ($totalPerPeriode[$kunci] ?? 0) + (float) $transaksi->jumlah;
    }

    $grafikPendapatan = [];

    if ($granularitasPendapatan === 'harian') {
        $cursor = $awal->copy();

        while ($cursor->lte($akhir)) {
            $kunci = $cursor->toDateString();

            $grafikPendapatan[] = [
                'label' => $cursor->format('d M Y'),
                'total' => (float) ($totalPerPeriode[$kunci] ?? 0),
            ];

            $cursor->addDay();
        }
    } elseif ($granularitasPendapatan === 'mingguan') {
        $cursor = $awal->copy()->startOfWeek(
            \Illuminate\Support\Carbon::MONDAY
        );

        $mingguTerakhir = $akhir->copy()->startOfWeek(
            \Illuminate\Support\Carbon::MONDAY
        );

        while ($cursor->lte($mingguTerakhir)) {
            $kunci = $cursor->toDateString();
            $labelAwal = $cursor->lt($awal) ? $awal->copy() : $cursor->copy();

            $akhirMinggu = $cursor->copy()->addDays(6);
            $labelAkhir = $akhirMinggu->gt($akhir) ? $akhir->copy() : $akhirMinggu;

            $grafikPendapatan[] = [
                'label' => $labelAwal->format('d M')
                    . ' - ' . $labelAkhir->format('d M Y'),
                'total' => (float) ($totalPerPeriode[$kunci] ?? 0),
            ];

            $cursor->addWeek();
        }
    } elseif ($granularitasPendapatan === 'bulanan') {
        $cursor = $awal->copy()->startOfMonth();

        while ($cursor->lte($akhir)) {
            $kunci = $cursor->format('Y-m');

            $grafikPendapatan[] = [
                'label' => $cursor->format('M Y'),
                'total' => (float) ($totalPerPeriode[$kunci] ?? 0),
            ];

            $cursor->addMonth();
        }
    } else {
        $cursor = $awal->copy()->startOfYear();
        $akhirTahun = $akhir->copy()->startOfYear();

        while ($cursor->lte($akhirTahun)) {
            $kunci = $cursor->format('Y');

            $grafikPendapatan[] = [
                'label' => $cursor->format('Y'),
                'total' => (float) ($totalPerPeriode[$kunci] ?? 0),
            ];

            $cursor->addYear();
        }
    }
// Fungsi untuk menentukan kunci periode berdasarkan kelompok waktu.
$buatKunciPeriode = function ($tanggal, $granularitas) {
    $tanggal = \Illuminate\Support\Carbon::parse($tanggal);

    return match ($granularitas) {
        'harian' => $tanggal->toDateString(),
        'mingguan' => $tanggal->copy()
            ->startOfWeek(\Illuminate\Support\Carbon::MONDAY)
            ->toDateString(),
        'bulanan' => $tanggal->format('Y-m'),
        'tahunan' => $tanggal->format('Y'),
    };
};

// Fungsi untuk membuat daftar periode sesuai rentang tanggal.
$buatDaftarPeriode = function ($mulai, $akhir, $granularitas) {
    $awal = \Illuminate\Support\Carbon::parse($mulai)->startOfDay();
    $batasAkhir = \Illuminate\Support\Carbon::parse($akhir)->startOfDay();

    $cursor = match ($granularitas) {
        'mingguan' => $awal->copy()->startOfWeek(
            \Illuminate\Support\Carbon::MONDAY
        ),
        'bulanan' => $awal->copy()->startOfMonth(),
        'tahunan' => $awal->copy()->startOfYear(),
        default => $awal->copy(),
    };

    $periode = [];

    while ($cursor->lte($batasAkhir)) {
        $kunci = match ($granularitas) {
            'harian' => $cursor->toDateString(),
            'mingguan' => $cursor->toDateString(),
            'bulanan' => $cursor->format('Y-m'),
            'tahunan' => $cursor->format('Y'),
        };

        $akhirPeriode = match ($granularitas) {
            'mingguan' => $cursor->copy()->addDays(6),
            'bulanan' => $cursor->copy()->endOfMonth(),
            'tahunan' => $cursor->copy()->endOfYear(),
            default => $cursor->copy(),
        };

        $labelMulai = $cursor->lt($awal)
            ? $awal->copy()
            : $cursor->copy();

        $labelAkhir = $akhirPeriode->gt($batasAkhir)
            ? $batasAkhir->copy()
            : $akhirPeriode->copy();

        $label = match ($granularitas) {
            'harian' => $cursor->format('d M Y'),
            'mingguan' => $labelMulai->format('d M')
                . ' - ' . $labelAkhir->format('d M Y'),
            'bulanan' => $cursor->format('M Y'),
            'tahunan' => $cursor->format('Y'),
        };

        $periode[] = [
            'key' => $kunci,
            'label' => $label,
        ];

        switch ($granularitas) {
            case 'harian':
                $cursor->addDay();
                break;

            case 'mingguan':
                $cursor->addWeek();
                break;

            case 'bulanan':
                $cursor->addMonth();
                break;

            case 'tahunan':
                $cursor->addYear();
                break;
        }
    }

    return $periode;
};

// GRAFIK 2: Pendapatan dengan kelompok waktu yang bisa dipilih.
$transaksiTahunan = DB::table('payment_transactions')
    ->whereNotNull('tanggal_pembayaran')
    ->whereDate('tanggal_pembayaran', '>=', $grafikTahunanMulai)
    ->whereDate('tanggal_pembayaran', '<=', $grafikTahunanAkhir)
    ->get(['jumlah', 'tanggal_pembayaran']);

$totalPendapatanPerPeriode = [];

foreach ($transaksiTahunan as $transaksi) {
    $kunci = $buatKunciPeriode(
        $transaksi->tanggal_pembayaran,
        $granularitasTahunan
    );

    $totalPendapatanPerPeriode[$kunci] =
        ($totalPendapatanPerPeriode[$kunci] ?? 0)
        + (float) $transaksi->jumlah;
}

$grafikPendapatanTahunan = [];

foreach (
    $buatDaftarPeriode(
        $grafikTahunanMulai,
        $grafikTahunanAkhir,
        $granularitasTahunan
    ) as $periode
) {
    $grafikPendapatanTahunan[] = [
        'label' => $periode['label'],
        'total' => (float) (
            $totalPendapatanPerPeriode[$periode['key']] ?? 0
        ),
    ];
}

    // GRAFIK 3: Tipe kamar terpopuler dengan kelompok waktu pilihan.
$bookingUntukKamar = Booking::whereDate(
    'checkin', '>=', $grafikKamarMulai
)
    ->whereDate('checkin', '<=', $grafikKamarAkhir)
    ->get(['tipe_kamar', 'status', 'checkin'])
    ->filter(function ($booking) {
        return $booking->status !== 'dibatalkan';
    })
    ->values();

$tipeKamarUnik = $bookingUntukKamar
    ->pluck('tipe_kamar')
    ->filter()
    ->unique()
    ->values();

$grafikTipeKamar = [];

$periodeKamar = $buatDaftarPeriode(
    $grafikKamarMulai,
    $grafikKamarAkhir,
    $granularitasKamar
);

foreach ($periodeKamar as $periode) {
    foreach ($tipeKamarUnik as $tipeKamar) {
        $jumlah = $bookingUntukKamar
            ->filter(function ($booking) use (
                $tipeKamar,
                $periode,
                $buatKunciPeriode,
                $granularitasKamar
            ) {
                return $booking->tipe_kamar === $tipeKamar
                    && $buatKunciPeriode(
                        $booking->checkin,
                        $granularitasKamar
                    ) === $periode['key'];
            })
            ->count();

        if ($jumlah > 0) {
            $grafikTipeKamar[] = [
                'label' => $periode['label'] . ' · ' . $tipeKamar,
                'jumlah' => $jumlah,
            ];
        }
    }
}

   // GRAFIK 4: Status booking dengan kelompok waktu pilihan.
$bookingUntukStatus = Booking::whereDate(
    'checkin', '>=', $grafikStatusMulai
)
    ->whereDate('checkin', '<=', $grafikStatusAkhir)
    ->get(['status', 'checkin']);

$daftarStatus = [
    ['status' => 'menunggu', 'label' => 'Menunggu'],
    ['status' => 'dikonfirmasi', 'label' => 'Dikonfirmasi'],
    ['status' => 'dibatalkan', 'label' => 'Dibatalkan'],
];

$grafikStatusBooking = [];

$periodeStatus = $buatDaftarPeriode(
    $grafikStatusMulai,
    $grafikStatusAkhir,
    $granularitasStatus
);

foreach ($periodeStatus as $periode) {
    foreach ($daftarStatus as $item) {
        $jumlah = $bookingUntukStatus
            ->filter(function ($booking) use (
                $item,
                $periode,
                $buatKunciPeriode,
                $granularitasStatus
            ) {
                return $booking->status === $item['status']
                    && $buatKunciPeriode(
                        $booking->checkin,
                        $granularitasStatus
                    ) === $periode['key'];
            })
            ->count();

        $grafikStatusBooking[] = [
            'label' => $periode['label'] . ' · ' . $item['label'],
            'jumlah' => $jumlah,
        ];
    }
}


    // Pagination 10 reservasi per halaman.
    $perPage = 10;
    $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

    $bookings = new \Illuminate\Pagination\LengthAwarePaginator(
        $bookings->forPage($currentPage, $perPage)->values(),
        $bookings->count(),
        $perPage,
        $currentPage,
        [
            'path' => \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPath(),
            'query' => request()->query(),
        ]
    );


    
return view('admin.pendapatan', compact(
    'bookings',
    'tanggalMulai',
    'tanggalAkhir',
    'totalBooking',
    'totalPendapatan',
    'totalDibayar',

    // Filter grafik pendapatan
    'granularitas',
    'granularitasPendapatan',
    'grafikPendapatanMulai',
    'grafikPendapatanAkhir',

    // Filter grafik pendapatan tahunan
    'grafikTahunanMulai',
    'grafikTahunanAkhir',

    // Filter grafik tipe kamar
    'grafikKamarMulai',
    'grafikKamarAkhir',

    // Filter grafik status booking
    'grafikStatusMulai',
    'grafikStatusAkhir',

    // Data grafik
    'grafikPendapatan',
    'grafikPendapatanTahunan',
    'grafikTipeKamar',
    'grafikStatusBooking',
    'granularitasTahunan',
    'granularitasKamar',
    'granularitasStatus'
));

 
}

 


public function updatePayment(Request $request, Booking $booking)
{
    $data = $request->validate([
        'metode_pembayaran' => 'required|in:tunai,transfer,qris,kartu',
        'jumlah_pembayaran_baru' => 'required|numeric|min:1',
    ]);

    $hargaKamar = Room::where('tipe_kamar', $booking->tipe_kamar)
        ->value('harga_per_malam');

    if ($hargaKamar === null || (float) $hargaKamar <= 0) {
        return back()
            ->withInput()
            ->withErrors([
                'jumlah_pembayaran_baru' => 'Harga kamar belum diatur.',
            ]);
    }

    $checkin = \Illuminate\Support\Carbon::parse($booking->checkin);
    $checkout = \Illuminate\Support\Carbon::parse($booking->checkout);

    $jumlahMalam = max(0, (int) $checkin->diffInDays($checkout));
    $totalTagihan = round((float) $hargaKamar * $jumlahMalam, 2);

    // Jumlah yang dimasukkan adalah pembayaran baru,
    // bukan total pembayaran kumulatif.
    $jumlahBaru = round((float) $data['jumlah_pembayaran_baru'], 2);
    $jumlahSebelumnya = (float) ($booking->jumlah_dibayar ?? 0);
    $totalSudahDibayar = round($jumlahSebelumnya + $jumlahBaru, 2);

    if ($jumlahBaru <= 0) {
        return back()->withErrors([
            'jumlah_pembayaran_baru' => 'Nominal pembayaran harus lebih dari nol.',
        ]);
    }

    if ($totalTagihan <= 0 || $totalSudahDibayar > $totalTagihan) {
        return back()
            ->withInput()
            ->withErrors([
                'jumlah_pembayaran_baru' =>
                    'Pembayaran melebihi sisa tagihan. Sisa tagihan saat ini Rp '
                    . number_format(
                        max(0, $totalTagihan - $jumlahSebelumnya),
                        0,
                        ',',
                        '.'
                    ) . '.',
            ]);
    }

    $statusPembayaran = $totalSudahDibayar >= $totalTagihan
        ? 'lunas'
        : 'sebagian';

    DB::transaction(function () use (
        $booking,
        $data,
        $jumlahBaru,
        $totalSudahDibayar,
        $statusPembayaran
    ) {
        // Catat setiap pembayaran sebagai transaksi terpisah.
        PaymentTransaction::create([
            'booking_id' => $booking->id,
            'jumlah' => $jumlahBaru,
            'metode_pembayaran' => $data['metode_pembayaran'],
            'tanggal_pembayaran' => now(),
        ]);

        // Perbarui total pembayaran pada booking.
        $booking->jumlah_dibayar = $totalSudahDibayar;
        $booking->status_pembayaran = $statusPembayaran;
        $booking->metode_pembayaran = $data['metode_pembayaran'];
        $booking->tanggal_pembayaran = now();

        $booking->save();
    });

    
    // Buat notifikasi dashboard untuk admin.
    // Jika notifikasi gagal dibuat, transaksi pembayaran tetap aman.
    try {
        $admin = auth()->user();

        if ($admin) {
            $admin->notifications()->create([
                'id' => (string) \Illuminate\Support\Str::uuid(),
                'type' => 'payment_recorded',
                'data' => [
                    'jenis' => 'pembayaran',
                    'pesan' => 'Pembayaran baru dari '
                        . $booking->nama
                        . ' sebesar Rp '
                        . number_format($jumlahBaru, 0, ',', '.'),
                    'kode_booking' => $booking->kode_booking,
                    'tanggal_checkin' => $booking->checkin,
                    'tanggal_checkout' => $booking->checkout,
                    'nominal_pembayaran' => $jumlahBaru,
                    'total_tagihan' => $totalTagihan,
                    'total_dibayar' => $totalSudahDibayar,
                    'sisa_tagihan' => max(
                        0,
                        $totalTagihan - $totalSudahDibayar
                    ),
                    'metode_pembayaran' => $data['metode_pembayaran'],
                    'status_pembayaran' => $statusPembayaran,
                ],
            ]);
        }
    } catch (\Throwable $e) {
        report($e);
    }


    // Kirim email setelah transaksi pembayaran berhasil disimpan.
    $pesanEmail = '';

    if (!empty($booking->email)) {
        try {
            Mail::to($booking->email)->send(
                new PaymentReceivedMail(
                    $booking->fresh(),
                    (float) $jumlahBaru,
                    (float) $totalTagihan,
                    (float) $totalSudahDibayar,
                    $data['metode_pembayaran']
                )
            );

            $pesanEmail = ' Email notifikasi pembayaran berhasil dikirim.';
        } catch (\Throwable $e) {
            report($e);

            $pesanEmail = ' Pembayaran berhasil disimpan, tetapi email gagal dikirim. Periksa konfigurasi SMTP.';
        }
    } else {
        $pesanEmail = ' Pembayaran tersimpan, tetapi email tidak dikirim karena email tamu belum tersedia.';
    }

    return redirect()
        ->route('booking.index')
        ->with(
            'success',
            'Transaksi Rp ' . number_format($jumlahBaru, 0, ',', '.')
            . ' berhasil dicatat. Status pembayaran: '
            . ($statusPembayaran === 'lunas' ? 'Lunas.' : 'Dibayar sebagian.')
            . $pesanEmail
        );
}


public function receipt(Booking $booking)
{
    $hargaKamar = (float) (
        Room::where('tipe_kamar', $booking->tipe_kamar)
            ->value('harga_per_malam') ?? 0
    );

    $checkin = \Illuminate\Support\Carbon::parse($booking->checkin);
    $checkout = \Illuminate\Support\Carbon::parse($booking->checkout);

    $jumlahMalam = max(0, (int) $checkin->diffInDays($checkout));
    $totalTagihan = $hargaKamar * $jumlahMalam;
    $jumlahDibayar = (float) ($booking->jumlah_dibayar ?? 0);
    $sisaTagihan = max(0, $totalTagihan - $jumlahDibayar);

    return view('admin.kuitansi', compact(
        'booking',
        'hargaKamar',
        'jumlahMalam',
        'totalTagihan',
        'jumlahDibayar',
        'sisaTagihan'
    ));
}


public function assignRoom(Request $request, Booking $booking)
{
    // Validasi pilihan nomor kamar
    $data = $request->validate([
        'room_id' => ['required', 'integer', 'exists:rooms,id'],
    ]);

    if ($booking->room_id !== null) {
    return back()->withErrors([
        'room_id' => 'Kamar sudah ditetapkan. Gunakan proses perubahan kamar jika perlu menggantinya.',
    ]);
}

    $room = Room::findOrFail($data['room_id']);

    // Pastikan tipe kamar sesuai dengan booking
    if ($room->tipe_kamar !== $booking->tipe_kamar) {
        return back()
            ->withInput()
            ->withErrors([
                'room_id' => 'Tipe kamar yang dipilih tidak sesuai dengan booking.',
            ]);
    }

    // Kamar yang sedang diperbaiki tidak boleh ditetapkan
    if ($room->status === 'perbaikan') {
        return back()
            ->withInput()
            ->withErrors([
                'room_id' => 'Kamar ini sedang dalam perbaikan.',
            ]);
    }

    // Periksa apakah kamar sudah dipakai booking lain
    // pada tanggal menginap yang bertabrakan
    $bentrok = Booking::where('room_id', $room->id)
        ->where('id', '!=', $booking->id)
        ->whereIn('status', ['menunggu', 'dikonfirmasi'])
        ->whereDate('checkin', '<', $booking->checkout)
        ->whereDate('checkout', '>', $booking->checkin)
        ->exists();

    if ($bentrok) {
        return back()
            ->withInput()
            ->withErrors([
                'room_id' => 'Kamar ini sudah ditetapkan kepada tamu lain pada tanggal tersebut.',
            ]);
    }

    // Simpan nomor kamar ke booking
    $booking->room_id = $room->id;
    $booking->save();

    return back()->with(
        'success',
        'Kamar nomor ' . $room->nomor_kamar .
        ' berhasil ditetapkan untuk booking ' . $booking->kode_booking . '.'
    );
}

public function changeRoom(Request $request, Booking $booking)
{
    $data = $request->validate([
        'room_id' => ['required', 'integer', 'exists:rooms,id'],
        'alasan' => ['required', 'string', 'max:1000'],
    ]);

    // Booking harus sudah memiliki kamar sebelumnya
    if (!$booking->room_id) {
        return back()->withErrors([
            'room_id' => 'Booking ini belum memiliki nomor kamar.',
        ]);
    }

    if ($booking->status === 'dibatalkan') {
        return back()->withErrors([
            'room_id' => 'Booking yang dibatalkan tidak dapat dipindahkan.',
        ]);
    }

    $kamarLama = Room::find($booking->room_id);
    $kamarBaru = Room::findOrFail($data['room_id']);

    if (!$kamarLama) {
        return back()->withErrors([
            'room_id' => 'Data kamar lama tidak ditemukan.',
        ]);
    }

    if ((int) $kamarLama->id === (int) $kamarBaru->id) {
        return back()->withErrors([
            'room_id' => 'Pilih nomor kamar yang berbeda dari kamar saat ini.',
        ]);
    }

    // Tipe kamar harus sesuai dengan booking
    if ($kamarBaru->tipe_kamar !== $booking->tipe_kamar) {
        return back()->withErrors([
            'room_id' => 'Tipe kamar pengganti harus sama dengan tipe booking.',
        ]);
    }

    // Kamar pengganti tidak boleh sedang diperbaiki
    if ($kamarBaru->status === 'perbaikan') {
        return back()->withErrors([
            'room_id' => 'Kamar pengganti sedang dalam perbaikan.',
        ]);
    }

    // Pastikan kamar pengganti tidak dipakai booking lain
    $bentrok = Booking::where('room_id', $kamarBaru->id)
        ->where('id', '!=', $booking->id)
        ->whereIn('status', ['menunggu', 'dikonfirmasi'])
        ->whereDate('checkin', '<', $booking->checkout)
        ->whereDate('checkout', '>', $booking->checkin)
        ->exists();

    if ($bentrok) {
        return back()->withErrors([
            'room_id' => 'Kamar pengganti sudah digunakan booking lain pada tanggal tersebut.',
        ]);
    }

    // Simpan perubahan kamar dan riwayatnya
    DB::transaction(function () use (
        $booking,
        $kamarLama,
        $kamarBaru,
        $data
    ) {
        $booking->update([
            'room_id' => $kamarBaru->id,
        ]);

        DB::table('room_assignment_histories')->insert([
            'booking_id' => $booking->id,
            'old_room_id' => $kamarLama->id,
            'new_room_id' => $kamarBaru->id,
            'alasan' => $data['alasan'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    });

    return redirect()
        ->route('booking.index')
        ->with(
            'success',
            'Kamar berhasil dipindahkan dari nomor '
                . $kamarLama->nomor_kamar
                . ' ke nomor '
                . $kamarBaru->nomor_kamar
                . '. Riwayat perubahan telah disimpan.'
        );
}

public function checkIn(Booking $booking)
{
    if ($booking->status !== 'dikonfirmasi') {
        return redirect()
            ->route('booking.index')
            ->with('error', 'Booking harus dikonfirmasi sebelum check-in.');
    }

    if (($booking->status_menginap ?? 'belum_checkin') !== 'belum_checkin') {
        return redirect()
            ->route('booking.index')
            ->with('error', 'Tamu sudah check-in atau sudah selesai menginap.');
    }

    $booking->status_menginap = 'sedang_menginap';
    $booking->waktu_checkin = now();
    $booking->save();

    return redirect()
        ->route('booking.index')
        ->with('success', 'Check-in tamu berhasil dicatat.');
}


public function checkOut(Booking $booking)
{
    if ($booking->status_menginap !== 'sedang_menginap') {
        return redirect()
            ->route('booking.index')
            ->with('error', 'Tamu harus check-in terlebih dahulu.');
    }

    $booking->status_menginap = 'selesai';
    $booking->waktu_checkout = now();
    $booking->save();

    return redirect()
        ->route('booking.index')
        ->with('success', 'Check-out tamu berhasil dicatat.');
}


public function showCheckBooking()
{
    return view('cek-booking');
}

public function checkBooking(Request $request)
{
    $data = $request->validate([
        'kode_booking' => 'required|string|max:30',
        'telepon' => 'required|string|max:30',
    ]);

    $booking = Booking::where('kode_booking', trim($data['kode_booking']))
        ->where('telepon', trim($data['telepon']))
        ->first();

    if (!$booking) {
        return back()
            ->withInput()
            ->with('error', 'Booking tidak ditemukan. Periksa kembali kode booking dan nomor telepon.');
    }

    return view('cek-booking', compact('booking'));
}



}