<?php

namespace App\Exports;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RevenueReportExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles
{
    protected string $tanggalMulai;
    protected string $tanggalAkhir;
    protected $hargaKamar;

    public function __construct(
        string $tanggalMulai,
        string $tanggalAkhir
    ) {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalAkhir = $tanggalAkhir;

        $this->hargaKamar = Room::pluck(
            'harga_per_malam',
            'tipe_kamar'
        );
    }

    public function collection(): \Illuminate\Support\Enumerable
{
    return Booking::where('status', 'dikonfirmasi')
        ->whereDate('checkin', '>=', $this->tanggalMulai)
        ->whereDate('checkin', '<=', $this->tanggalAkhir)
        ->orderBy('checkin')
        ->get();
}
    }

    public function headings(): array
    {
        return [
            'Kode Booking',
            'Nama Tamu',
            'Tipe Kamar',
            'Check-in',
            'Check-out',
            'Jumlah Malam',
            'Harga per Malam',
            'Estimasi Nilai Reservasi',
            'Total Dibayar',
            'Status Pembayaran',
        ];
    }

    public function map($booking): array
    {
        $checkin = Carbon::parse($booking->checkin);
        $checkout = Carbon::parse($booking->checkout);

        $jumlahMalam = max(
            0,
            (int) $checkin->diffInDays($checkout)
        );

        $hargaPerMalam = (float) (
            $this->hargaKamar[$booking->tipe_kamar] ?? 0
        );

        $estimasiNilai = $hargaPerMalam * $jumlahMalam;

        return [
            $booking->kode_booking,
            $booking->nama,
            $booking->tipe_kamar,
            $checkin->format('Y-m-d'),
            $checkout->format('Y-m-d'),
            $jumlahMalam,
            $hargaPerMalam,
            $estimasiNilai,
            (float) ($booking->jumlah_dibayar ?? 0),
            $booking->status_pembayaran ?? 'belum_dibayar',
        ];
    }

   public function styles(Worksheet $sheet): array
{
    return [
        1 => [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'FFFFFF',
                ],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'rgb' => '214B3B',
                ],
            ],
        ],
    ];
}
}