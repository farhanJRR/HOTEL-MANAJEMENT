<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_room_is_available_when_inventory_exists(): void
    {
        Room::create([
            'nomor_kamar' => '101',
            'tipe_kamar' => 'Standard',
            'harga_per_malam' => 300000,
            'kapasitas' => 2,
            'status' => 'tersedia',
        ]);

        $checkin = now()->addDays(3)->toDateString();
        $checkout = now()->addDays(4)->toDateString();

        $response = $this->getJson(route('booking.availability', [
            'tipe_kamar' => 'Standard',
            'checkin' => $checkin,
            'checkout' => $checkout,
        ]));

        $response->assertOk()
            ->assertJsonPath('tersedia', true)
            ->assertJsonPath('jumlah', 1);
    }

    public function test_overlapping_active_booking_reduces_availability(): void
    {
        Room::create([
            'nomor_kamar' => '102',
            'tipe_kamar' => 'Standard',
            'harga_per_malam' => 300000,
            'kapasitas' => 2,
            'status' => 'tersedia',
        ]);

        $checkin = now()->addDays(3)->toDateString();
        $checkout = now()->addDays(5)->toDateString();

        Booking::create([
            'kode_booking' => 'SV-TEST0001',
            'nama' => 'Tamu Pengujian',
            'email' => 'tamu@example.com',
            'telepon' => '081234567890',
            'checkin' => $checkin,
            'checkout' => $checkout,
            'tipe_kamar' => 'Standard',
            'jumlah_tamu' => 2,
            'status' => 'dikonfirmasi',
        ]);

        $response = $this->getJson(route('booking.availability', [
            'tipe_kamar' => 'Standard',
            'checkin' => $checkin,
            'checkout' => $checkout,
        ]));

        $response->assertOk()
            ->assertJsonPath('tersedia', false)
            ->assertJsonPath('jumlah', 0);
    }

    public function test_checkout_must_be_after_checkin(): void
    {
        $checkin = now()->addDays(3)->toDateString();

        $response = $this->getJson(route('booking.availability', [
            'tipe_kamar' => 'Standard',
            'checkin' => $checkin,
            'checkout' => $checkin,
        ]));

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['checkout']);
    }
}
