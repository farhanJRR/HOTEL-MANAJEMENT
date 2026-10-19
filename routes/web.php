
<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RoomController;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Halaman utama website

 // Halaman utama website
Route::get('/', function () {
    $hargaStandard = Room::where('tipe_kamar', 'Standard')
        ->where('status', '!=', 'perbaikan')
        ->min('harga_per_malam');

    $hargaDeluxeDouble = Room::where('tipe_kamar', 'Deluxe Double')
        ->where('status', '!=', 'perbaikan')
        ->min('harga_per_malam');

    $hargaDeluxeTwin = Room::where('tipe_kamar', 'Deluxe Twin')
        ->where('status', '!=', 'perbaikan')
        ->min('harga_per_malam');

    $hargaDeluxe = collect([
        $hargaDeluxeDouble,
        $hargaDeluxeTwin,
    ])->filter(fn ($harga) => $harga !== null)->min();

    $hargaSuite = Room::where('tipe_kamar', 'Suite')
        ->where('status', '!=', 'perbaikan')
        ->min('harga_per_malam');

    return view('welcome', compact(
        'hargaStandard',
        'hargaDeluxe',
        'hargaSuite',
        'hargaDeluxeDouble',
        'hargaDeluxeTwin'
    ));
});


// Cek ketersediaan kamar sebelum tamu memesan
Route::get('/cek-ketersediaan', function (Request $request) {
    $data = $request->validate([
        'tipe_kamar' => ['required', 'string'],
        'checkin' => ['required', 'date', 'after_or_equal:today'],
        'checkout' => ['required', 'date', 'after:checkin'],
    ]);

    // Hitung kamar yang bisa dijual
    $totalKamar = Room::where('tipe_kamar', $data['tipe_kamar'])
        ->where('status', '!=', 'perbaikan')
        ->count();

    // Hitung booking yang bertabrakan dengan tanggal pilihan
    $bookingAktif = Booking::where('tipe_kamar', $data['tipe_kamar'])
        ->whereIn('status', ['menunggu', 'dikonfirmasi'])
        ->whereDate('checkin', '<', $data['checkout'])
        ->whereDate('checkout', '>', $data['checkin'])
        ->count();

    $sisaKamar = max(0, $totalKamar - $bookingAktif);

    return response()->json([
        'tersedia' => $sisaKamar > 0,
        'jumlah' => $sisaKamar,
        'pesan' => $sisaKamar > 0
            ? "Kamar tersedia. Tersisa {$sisaKamar} kamar."
            : 'Maaf, kamar tidak tersedia untuk tanggal tersebut. Silakan pilih tanggal atau tipe kamar lain.',
    ]);
})->name('booking.availability');

// Booking tamu tanpa login
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

// Cek status booking oleh tamu
Route::get('/cek-booking', [BookingController::class, 'showCheckBooking'])
    ->name('booking.check.form');

Route::post('/cek-booking', [BookingController::class, 'checkBooking'])
    ->name('booking.check');

// Login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

// Halaman admin yang dilindungi login
Route::middleware('auth')->group(function () {

Route::patch('/admin/notifikasi/{notification}/read', function (
    \Illuminate\Notifications\DatabaseNotification $notification
) {
    abort_unless(
        $notification->notifiable_type === \App\Models\User::class
        && $notification->notifiable_id === auth()->id(),
        403
    );

    $notification->markAsRead();

    return back()->with(
        'success',
        'Notifikasi berhasil ditandai sudah dibaca.'
    );
})->name('notifications.read');

    // Dashboard admin
    Route::get('/admin/dashboard', function () {
        $totalBooking = Booking::count();
        $menunggu = Booking::where('status', 'menunggu')->count();
        $dikonfirmasi = Booking::where('status', 'dikonfirmasi')->count();
        $dibatalkan = Booking::where('status', 'dibatalkan')->count();

        $totalKamar = Room::count();
        $kamarTersedia = Room::where('status', 'tersedia')->count();
        $user = auth()->user();

$notifikasi = $user->notifications()
    ->latest()
    ->take(10)
    ->get();

$jumlahNotifikasiBelumDibaca = $user->unreadNotifications()->count();

       return view('admin.dashboard', compact(
    'totalBooking',
    'menunggu',
    'dikonfirmasi',
    'dibatalkan',
    'totalKamar',
    'kamarTersedia',
    'notifikasi',
    'jumlahNotifikasiBelumDibaca'
));
    })->name('admin.dashboard');

    // Daftar booking
    Route::get('/admin/booking', [BookingController::class, 'index'])
        ->name('booking.index');

    // Kalender reservasi
    Route::get('/admin/kalender', [BookingController::class, 'calendar'])
        ->name('booking.calendar');

    Route::get('/admin/laporan', [BookingController::class, 'report'])
    ->name('booking.report');

    Route::get('/admin/pendapatan', [BookingController::class, 'revenue'])
    ->name('booking.revenue');

    Route::get('/admin/pendapatan/export', [
    BookingController::class,
    'exportRevenue'
])->name('booking.revenue.export');

    // Ubah status booking
    Route::patch('/admin/booking/{booking}/status', [BookingController::class, 'updateStatus'])
         ->name('booking.updateStatus');

Route::patch(
    '/admin/booking/{booking}/room',
    [BookingController::class, 'assignRoom']
)->name('booking.assignRoom');

Route::patch(
    '/admin/booking/{booking}/room/change',
    [BookingController::class, 'changeRoom']
)->name('booking.changeRoom');

    Route::patch('/admin/booking/{booking}/room', [BookingController::class, 'assignRoom'])
        ->name('booking.assignRoom');
   
    Route::patch('/admin/booking/{booking}/checkin', [BookingController::class, 'checkIn'])
       ->name('booking.checkin');

    Route::patch('/admin/booking/{booking}/checkout', [BookingController::class, 'checkOut'])
       ->name('booking.checkout');

        
    Route::patch('/admin/booking/{booking}/payment', [BookingController::class, 'updatePayment'])
          ->name('booking.updatePayment');
    
    Route::get('/admin/booking/{booking}/kuitansi', [BookingController::class, 'receipt'])
          ->name('booking.receipt');
  

    // Logout admin
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    // Manajemen kamar
    Route::resource('/admin/rooms', RoomController::class)
        ->names('admin.rooms');
});
