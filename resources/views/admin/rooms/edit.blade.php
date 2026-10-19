<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar - ELFAR JUNIOR</title>
    <style>
       * {
    box-sizing: border-box;
}

:root {
    --emerald: #064e3b;
    --emerald-dark: #022c22;
    --gold: #c9a45c;
    --text: #24332b;
    --muted: #6b786f;
    --border: #e1e8e2;
    --page: #f5f7f4;
}

body {
    margin: 0;
    padding: 30px 20px;
    font-family: "Segoe UI", Arial, sans-serif;
    background: var(--page);
    color: var(--text);
    line-height: 1.6;
}

.container {
    width: 100%;
    max-width: 680px;
    margin: 20px auto;
    padding: 32px;
    background: #fff;
    border: 1px solid var(--border);
    border-top: 4px solid var(--gold);
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(25, 50, 33, .06);
}

h2 {
    margin: 0 0 25px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--border);
    color: var(--emerald);
    font-size: 27px;
    line-height: 1.35;
}

label {
    display: block;
    margin: 18px 0 8px;
    color: #35453a;
    font-size: 13px;
    font-weight: 700;
}

input,
select,
textarea {
    display: block;
    width: 100%;
    margin-top: 0;
    padding: 12px 14px;
    border: 1px solid #d8e1d9;
    border-radius: 9px;
    background: #fbfcfa;
    color: var(--text);
    font-family: inherit;
    font-size: 14px;
    line-height: 1.5;
    outline: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

input,
select {
    min-height: 46px;
}

textarea {
    min-height: 110px;
    resize: vertical;
}

input:focus,
select:focus,
textarea:focus {
    border-color: var(--emerald);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(6, 78, 59, .10);
}

button,
.back {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-top: 24px;
    padding: 12px 18px;
    border: 1px solid var(--gold);
    border-radius: 9px;
    background: var(--emerald);
    color: #fff;
    font-family: inherit;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: background .2s, transform .2s, box-shadow .2s;
}

button:hover {
    background: var(--emerald-dark);
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(6, 78, 59, .12);
}

.back {
    margin-left: 8px;
    border-color: #cddbd0;
    background: #fff;
    color: var(--emerald);
}

.back:hover {
    background: #f0f7f2;
    color: var(--emerald-dark);
    border-color: var(--emerald);
}

.error {
    margin-top: 6px;
    color: #b42318;
    font-size: 12px;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

button:focus-visible,
.back:focus-visible {
    outline: 3px solid rgba(201, 164, 92, .65);
    outline-offset: 3px;
}

@media (max-width: 600px) {
    body {
        padding: 16px 12px;
    }

    .container {
        margin: 10px auto;
        padding: 24px 18px;
        border-radius: 12px;
    }

    h2 {
        font-size: 24px;
    }

    button,
    .back {
        padding: 12px 14px;
        font-size: 13px;
    }

    .back {
        margin-left: 4px;
    }
}
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Data Kamar</h2>

    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nomor Kamar</label>
        <input type="text" name="nomor_kamar"
            value="{{ old('nomor_kamar', $room->nomor_kamar) }}" required>
        @error('nomor_kamar') <div class="error">{{ $message }}</div> @enderror

        <label>Tipe Kamar</label>
<select name="tipe_kamar" required>
    <option value="">Pilih Tipe Kamar</option>
    <option value="Standard" {{ old('tipe_kamar', $room->tipe_kamar) == 'Standard' ? 'selected' : '' }}>Standard</option>
    <option value="Deluxe Double" {{ old('tipe_kamar', $room->tipe_kamar) == 'Deluxe Double' ? 'selected' : '' }}>Deluxe Double</option>
    <option value="Deluxe Twin" {{ old('tipe_kamar', $room->tipe_kamar) == 'Deluxe Twin' ? 'selected' : '' }}>Deluxe Twin</option>
    <option value="Suite" {{ old('tipe_kamar', $room->tipe_kamar) == 'Suite' ? 'selected' : '' }}>Suite</option>
</select>

@error('tipe_kamar')
    <div class="error">{{ $message }}</div>
@enderror

        <label>Harga per Malam (Rp)</label>
        <input type="number" name="harga_per_malam" min="0"
            value="{{ old('harga_per_malam', $room->harga_per_malam) }}" required>
        @error('harga_per_malam') <div class="error">{{ $message }}</div> @enderror

        <label>Kapasitas Tamu</label>
        <input type="number" name="kapasitas" min="1" max="255"
            value="{{ old('kapasitas', $room->kapasitas) }}" required>
        @error('kapasitas') <div class="error">{{ $message }}</div> @enderror

        <label>Status Kamar</label>
        <select name="status" required>
            @foreach (['tersedia' => 'Tersedia', 'terisi' => 'Terisi', 'dibersihkan' => 'Dibersihkan', 'perbaikan' => 'Perbaikan'] as $value => $label)
                <option value="{{ $value }}"
                    {{ old('status', $room->status) === $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('status') <div class="error">{{ $message }}</div> @enderror

        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="4">{{ old('deskripsi', $room->deskripsi) }}</textarea>
        @error('deskripsi') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('admin.rooms.index') }}" class="back">Kembali</a>
    </form>
</div>
</body>
</html>
