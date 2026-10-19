<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar | ELFAR JUNIOR </title>

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
    font-family: "Segoe UI", Arial, sans-serif;
    background: var(--page);
    color: var(--text);
    line-height: 1.6;
}

header {
    background: linear-gradient(110deg, #022c22, #064e3b);
    color: #fff;
    padding: 24px 6%;
    border-bottom: 4px solid var(--gold);
    box-shadow: 0 5px 20px rgba(6, 78, 59, .10);
}

header h1 {
    margin: 0;
    font-size: 22px;
    font-weight: 800;
    letter-spacing: .3px;
}

.container {
    width: 100%;
    max-width: 760px;
    margin: 38px auto;
    padding: 0 20px;
}

.container > div:first-child {
    margin-bottom: 22px !important;
}

.container > div:first-child h2 {
    margin: 0 0 7px;
    color: var(--emerald);
    font-size: 27px;
    line-height: 1.35;
}

.container > div:first-child p {
    margin: 0;
    color: var(--muted) !important;
    font-size: 14px;
    line-height: 1.7;
}

.card {
    padding: 30px;
    background: #fff;
    border: 1px solid var(--border);
    border-top: 4px solid var(--gold);
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(25, 50, 33, .06);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #35453a;
    font-size: 13px;
    font-weight: 700;
}

input,
select,
textarea {
    display: block;
    width: 100%;
    margin: 0 0 18px;
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

input:focus,
select:focus,
textarea:focus {
    border-color: var(--emerald);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(6, 78, 59, .10);
}

input::placeholder,
textarea::placeholder {
    color: #9aa49c;
}

textarea {
    min-height: 110px;
    resize: vertical;
}

.error {
    margin-top: -11px;
    margin-bottom: 16px;
    color: #b42318;
    font-size: 12px;
    line-height: 1.5;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 19px;
    border: 1px solid var(--gold);
    border-radius: 9px;
    background: var(--emerald);
    color: #fff;
    text-decoration: none;
    font-family: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: background .2s, transform .2s, box-shadow .2s;
}

.btn:hover {
    background: var(--emerald-dark);
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(6, 78, 59, .12);
}

.btn-secondary {
    background: #fff;
    color: var(--emerald);
    border-color: #cddbd0;
}

.btn-secondary:hover {
    background: #f0f7f2;
    color: var(--emerald-dark);
    border-color: var(--emerald);
}

button:focus-visible,
a.btn:focus-visible {
    outline: 3px solid rgba(201, 164, 92, .65);
    outline-offset: 3px;
}

@media (max-width: 600px) {
    header {
        padding: 20px 5%;
    }

    header h1 {
        font-size: 19px;
    }

    .container {
        margin: 25px auto;
        padding: 0 12px;
    }

    .container > div:first-child h2 {
        font-size: 24px;
    }

    .card {
        padding: 22px 18px;
        border-radius: 12px;
    }

    .btn {
        padding: 12px 15px;
        font-size: 13px;
    }
}

    </style>
</head>

<body>
<header>
    <h1>ELFAR JUNIOR| Tambah Kamar</h1>
</header>

<div class="container">
    <div style="margin-bottom:20px;">
        <h2>Tambah Kamar Baru</h2>
        <p style="color:#627d98;">
            Masukkan informasi kamar hotel di bawah ini.
        </p>
    </div>

    <div class="card">
        <form action="{{ route('admin.rooms.store') }}" method="POST">
            @csrf

            <label for="nomor_kamar">Nomor Kamar</label>
            <input
                type="text"
                id="nomor_kamar"
                name="nomor_kamar"
                value="{{ old('nomor_kamar') }}"
                placeholder="Contoh: 101"
                required
            >
            @error('nomor_kamar')
                <div class="error">{{ $message }}</div>
            @enderror

            
<label>Tipe Kamar</label>
<select name="tipe_kamar" required>
    <option value="">Pilih Tipe Kamar</option>
    <option value="Standard" {{ old('tipe_kamar') == 'Standard' ? 'selected' : '' }}>Standard</option>
    <option value="Deluxe Double" {{ old('tipe_kamar') == 'Deluxe Double' ? 'selected' : '' }}>Deluxe Double</option>
    <option value="Deluxe Twin" {{ old('tipe_kamar') == 'Deluxe Twin' ? 'selected' : '' }}>Deluxe Twin</option>
    <option value="Suite" {{ old('tipe_kamar') == 'Suite' ? 'selected' : '' }}>Suite</option>
</select>
@error('tipe_kamar')
    <div class="error">{{ $message }}</div>
@enderror


            <label for="harga_per_malam">Harga per Malam (Rp)</label>
            <input
                type="number"
                id="harga_per_malam"
                name="harga_per_malam"
                value="{{ old('harga_per_malam') }}"
                min="0"
                step="1000"
                placeholder="Contoh: 350000"
                required
            >
            @error('harga_per_malam')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="kapasitas">Kapasitas Tamu</label>
            <input
                type="number"
                id="kapasitas"
                name="kapasitas"
                value="{{ old('kapasitas', 2) }}"
                min="1"
                max="255"
                required
            >
            @error('kapasitas')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="status">Status Kamar</label>
            <select id="status" name="status" required>
                <option value="tersedia" {{ old('status', 'tersedia') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="terisi" {{ old('status') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                <option value="dibersihkan" {{ old('status') == 'dibersihkan' ? 'selected' : '' }}>Dibersihkan</option>
                <option value="perbaikan" {{ old('status') == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="deskripsi">Deskripsi (Opsional)</label>
            <textarea
                id="deskripsi"
                name="deskripsi"
                rows="4"
                placeholder="Contoh: Kamar ber-AC dengan dua tempat tidur."
            >{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn">
                Simpan Kamar
            </button>

            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
</body>
</html>