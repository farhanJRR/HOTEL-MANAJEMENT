<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_kamar' => 'required|string|max:50|unique:rooms,nomor_kamar',
            'tipe_kamar' => 'required|string|max:100',
            'harga_per_malam' => 'required|integer|min:0',
            'kapasitas' => 'required|integer|min:1|max:255',
            'status' => 'required|in:tersedia,terisi,dibersihkan,perbaikan',
            'deskripsi' => 'nullable|string',
        ]);

        Room::create($data);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'nomor_kamar' => 'required|string|max:50|unique:rooms,nomor_kamar,' . $room->id,
            'tipe_kamar' => 'required|string|max:100',
            'harga_per_malam' => 'required|integer|min:0',
            'kapasitas' => 'required|integer|min:1|max:255',
            'status' => 'required|in:tersedia,terisi,dibersihkan,perbaikan',
            'deskripsi' => 'nullable|string',
        ]);

        $room->update($data);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Data kamar berhasil diperbarui!');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Kamar berhasil dihapus!');
    }
}
