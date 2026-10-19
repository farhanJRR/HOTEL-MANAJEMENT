
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ELFAR HOTEL  | Hotel Experience</title>

    <style>
        
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --emerald: #064e3b;
    --emerald-dark: #022c22;
    --gold: #c9a45c;
    --gold-light: #f7f0df;
    --text: #202923;
    --muted: #707b73;
    --surface: #ffffff;
    --page: #fafbf8;
    --border: #e5e9e3;
}

html {
    scroll-behavior: smooth;
    scroll-padding-top: 100px;
}

body {
    font-family: "Segoe UI", Arial, sans-serif;
    color: var(--text);
    background: var(--page);
    line-height: 1.6;
}

a {
    color: inherit;
    text-decoration: none;
}

nav {
    position: sticky;
    top: 0;
    z-index: 100;
    min-height: 78px;
    padding: 14px 6%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 24px;
    background: rgba(255, 255, 255, .97);
    border-bottom: 1px solid var(--border);
    box-shadow: 0 4px 18px rgba(21, 39, 28, .04);
    backdrop-filter: blur(12px);
}

.logo {
    flex-shrink: 0;
    font-size: 23px;
    font-weight: 850;
    letter-spacing: 1px;
    color: var(--emerald);
}

.logo span {
    color: var(--gold);
}

.nav-links {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: 6px;
}

.nav-links a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 8px;
    color: #435148;
    font-size: 13px;
    font-weight: 700;
    transition: background .2s, color .2s, border-color .2s;
}

.nav-links a:hover {
    background: #f0f7f2;
    color: var(--emerald);
}

.nav-links a[href="#booking"] {
    background: var(--emerald);
    color: #fff;
    border-color: var(--emerald);
}

.nav-links a[href="#booking"]:hover {
    background: var(--emerald-dark);
}

.nav-links a:last-child {
    border-color: #d7e2da;
}

.hero {
    position: relative;
    min-height: 590px;
    display: flex;
    align-items: center;
    padding: 90px 9%;
    color: #fff;
    background:
        linear-gradient(
            90deg,
            rgba(2, 35, 25, .88) 0%,
            rgba(2, 35, 25, .65) 48%,
            rgba(2, 35, 25, .16) 100%
        ),
        url("https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1800&q=85")
        center 55% / cover no-repeat;
}

.hero-content {
    max-width: 650px;
}

.eyebrow {
    display: inline-block;
    margin-bottom: 18px;
    color: var(--gold);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 3px;
    text-transform: uppercase;
}

h1 {
    margin-bottom: 22px;
    font-size: clamp(36px, 5vw, 64px);
    line-height: 1.12;
    letter-spacing: -1.4px;
    font-weight: 800;
}

.hero p {
    max-width: 570px;
    margin-bottom: 30px;
    color: #edf2ee;
    font-size: 16px;
    line-height: 1.9;
}

.gold-button,
.primary-button {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 9px;
    padding: 14px 23px;
    border: 1px solid var(--gold);
    border-radius: 8px;
    background: var(--gold);
    color: #1e2a21;
    font-size: 14px;
    font-weight: 800;
    transition: transform .2s, background .2s, box-shadow .2s;
}

.gold-button:hover {
    transform: translateY(-2px);
    background: #d7b875;
    box-shadow: 0 8px 22px rgba(0, 0, 0, .15);
}

section {
    padding: 82px 8%;
}

.section-heading {
    max-width: 680px;
    margin: 0 auto 42px;
    text-align: center;
}

.section-heading .eyebrow {
    margin-bottom: 12px;
}

.section-heading h2,
#virtual-tour h2 {
    margin-bottom: 12px;
    color: var(--emerald);
    font-size: clamp(27px, 3vw, 36px);
    line-height: 1.25;
    letter-spacing: -.5px;
}

.section-heading p {
    color: var(--muted);
    font-size: 15px;
    line-height: 1.8;
}

.rooms {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px;
}

.room-card {
    min-width: 0;
    overflow: hidden;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 13px;
    box-shadow: 0 5px 18px rgba(26, 51, 35, .045);
    transition: transform .25s, box-shadow .25s, border-color .25s;
}

.room-card:hover {
    transform: translateY(-5px);
    border-color: #d9c391;
    box-shadow: 0 14px 32px rgba(26, 51, 35, .11);
}

.room-card img {
    display: block;
    width: 100%;
    height: 225px;
    object-fit: cover;
    transition: transform .4s;
}

.room-card:hover img {
    transform: scale(1.035);
}

.room-info {
    padding: 22px;
}

.room-info h3 {
    margin-bottom: 10px;
    color: var(--emerald);
    font-size: 19px;
    line-height: 1.4;
}

.room-info p {
    min-height: 68px;
    color: var(--muted);
    font-size: 13px;
    line-height: 1.8;
}

.price {
    margin-top: 18px;
    padding-top: 15px;
    border-top: 1px solid var(--border);
    color: var(--emerald);
    font-size: 14px;
    font-weight: 800;
}

.features {
    background: #f0f4ef;
    border-top: 1px solid #e7ece6;
    border-bottom: 1px solid #e7ece6;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
}

.feature {
    padding: 32px 24px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 6px 22px rgba(26, 51, 35, .035);
    transition: transform .2s, border-color .2s;
}

.feature:hover {
    transform: translateY(-3px);
    border-color: #d9c391;
}

.feature .icon {
    display: block;
    margin-bottom: 16px;
    font-size: 34px;
}

.feature h3 {
    margin-bottom: 9px;
    color: var(--emerald);
    font-size: 17px;
}

.feature p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.8;
}

.panorama {
    position: relative;
    overflow: hidden;
    text-align: center;
    color: #fff;
    background:
        linear-gradient(rgba(2, 44, 34, .88), rgba(2, 44, 34, .88)),
        url("https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=1600&q=85")
        center / cover no-repeat;
}

.panorama h2 {
    font-size: clamp(27px, 3vw, 36px);
    line-height: 1.3;
}

.panorama p {
    max-width: 650px;
    margin: 18px auto 28px;
    color: #e2eae4;
    font-size: 15px;
    line-height: 1.9;
}

footer {
    padding: 32px 8%;
    background: var(--emerald-dark);
    color: #e2ebe5;
    text-align: center;
    font-size: 13px;
    line-height: 1.9;
}

footer strong {
    color: #fff;
    font-size: 16px;
    letter-spacing: .5px;
}

footer p {
    margin-top: 5px;
    color: #c6d5cb;
}

#virtual-tour {
    padding: 65px 8% !important;
    background: #fff !important;
    color: var(--text);
    border-top: 1px solid var(--border);
}

#virtual-tour p {
    margin: 10px auto 20px;
    color: var(--muted);
    font-size: 14px;
    line-height: 1.8;
}

#panorama {
    overflow: hidden;
    border: 1px solid #dfe6df;
    border-radius: 14px !important;
    box-shadow: 0 12px 34px rgba(14, 48, 31, .12);
}

@media (max-width: 1150px) {
    nav {
        padding-left: 4%;
        padding-right: 4%;
    }

    .nav-links {
        gap: 2px;
    }

    .nav-links a {
        padding: 9px 10px;
        font-size: 12px;
    }

    .rooms {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .room-info p {
        min-height: auto;
    }
}

@media (max-width: 800px) {
    nav {
        position: relative;
        height: auto;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
        padding: 18px 5%;
    }

    .logo {
        width: 100%;
        text-align: center;
        font-size: 22px;
    }

    .nav-links {
        width: 100%;
        justify-content: center;
        gap: 5px;
    }

    .nav-links a {
        padding: 9px 10px;
        font-size: 12px;
    }

    .hero {
        min-height: 500px;
        padding: 72px 7%;
        background-position: 58% center;
    }

    section {
        padding: 62px 7%;
    }

    .section-heading {
        margin-bottom: 30px;
    }

    .feature-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .feature {
        padding: 26px 20px;
    }

    #virtual-tour {
        padding: 50px 5% !important;
    }

    #panorama {
        height: 360px !important;
    }
}

@media (max-width: 520px) {
    .nav-links {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        width: 100%;
    }

    .nav-links a {
        text-align: center;
        font-size: 12px;
    }

    .hero {
        min-height: 470px;
        padding: 58px 6%;
        background-position: 60% center;
    }

    .hero-content {
        width: 100%;
    }

    h1 {
        font-size: clamp(34px, 10vw, 44px);
        letter-spacing: -.8px;
    }

    .hero p {
        font-size: 14px;
        line-height: 1.8;
    }

    .gold-button {
        padding: 13px 17px;
        font-size: 13px;
    }

    section {
        padding: 52px 6%;
    }

    .rooms {
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .room-card img {
        height: 235px;
    }

    .room-info {
        padding: 20px;
    }

    .section-heading h2,
    #virtual-tour h2 {
        font-size: 27px;
    }

    #panorama {
        height: 300px !important;
    }

    footer {
        padding: 28px 6%;
    }
}

@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        scroll-behavior: auto !important;
        transition: none !important;
        animation: none !important;
    }
}

    </style>
</head>

<body>
    <nav>
        <a class="logo" href="#">ELFAR<span>HOTEL</span></a>

        <div class="nav-links">
    
    <a class="nav-button" href="#kamar">Kamar</a>
    <a class="nav-button" href="#fasilitas">Fasilitas</a>
    <a class="nav-button" href="#virtual-tour">Virtual Tour</a>
    <a class="nav-button" href="#booking">Pesan Kamar</a>
    <a class="nav-button" href="{{ route('booking.check.form') }}">
        Cek Status Booking
    </a>
</div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <div class="eyebrow">YOUR STAY, YOUR EXPERIENCE</div>
            <h1>Temukan Pengalaman Menginap yang Berbeda.</h1>
            <p>
                Kenali setiap sudut hotel kami sebelum Anda datang.
                Jelajahi kamar, fasilitas, dan suasana hotel melalui
                pengalaman digital yang lebih interaktif.
            </p>
            <a class="gold-button" href="#virtual">Jelajahi Virtual Tour &rarr;</a>
        </div>
    </header>

    <section id="kamar">
        <div class="section-heading">
            <div class="eyebrow">ACCOMMODATION</div>
            <h2>Temukan Kamar Pilihanmu</h2>
            <p>Kenyamanan untuk setiap perjalanan dan setiap cerita.</p>
        </div>

       
<div class="rooms">
    <article class="room-card">
        <img
            src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&q=80"
            alt="Kamar Standard Hotel">
        <div class="room-info">
            <h3>Standard Room</h3>
            <p>Kamar nyaman dengan desain modern untuk perjalanan praktis.</p>
            <div class="price">
                @if ($hargaStandard !== null)
                    Mulai Rp{{ number_format((float) $hargaStandard, 0, ',', '.') }} / malam
                @else
                    Harga belum tersedia
                @endif
            </div>
        </div>
    </article>

    <article class="room-card">
        <img
            src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=800&q=80"
            alt="Kamar Deluxe Double Hotel">
        <div class="room-info">
            <h3>Deluxe Double</h3>
            <p>Kamar dengan tempat tidur double untuk kenyamanan beristirahat.</p>
            <div class="price">
                @if ($hargaDeluxeDouble !== null)
                    Mulai Rp{{ number_format((float) $hargaDeluxeDouble, 0, ',', '.') }} / malam
                @else
                    Harga belum tersedia
                @endif
            </div>
        </div>
    </article>

    <article class="room-card">
        <img
            src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80"
            alt="Kamar Deluxe Twin Hotel">
        <div class="room-info">
            <h3>Deluxe Twin</h3>
            <p>Kamar dengan dua tempat tidur terpisah, cocok untuk menginap bersama.</p>
            <div class="price">
                @if ($hargaDeluxeTwin !== null)
                    Mulai Rp{{ number_format((float) $hargaDeluxeTwin, 0, ',', '.') }} / malam
                @else
                    Harga belum tersedia
                @endif
            </div>
        </div>
    </article>

    <article class="room-card">
        <img
            src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80"
            alt="Kamar Suite Hotel">
        <div class="room-info">
            <h3>Suite Room</h3>
            <p>Pengalaman menginap dengan ruang lebih luas dan kenyamanan ekstra.</p>
            <div class="price">
                @if ($hargaSuite !== null)
                    Mulai Rp{{ number_format((float) $hargaSuite, 0, ',', '.') }} / malam
                @else
                    Harga belum tersedia
                @endif
            </div>
        </div>
    </article>
</div>

    </section>

    <section class="features" id="fasilitas">
        <div class="section-heading">
            <div class="eyebrow">HOTEL EXPERIENCE</div>
            <h2>Kenyamanan dalam Setiap Detail</h2>
            <p>Semua yang Anda butuhkan untuk pengalaman menginap yang menyenangkan.</p>
        </div>

        <div class="feature-grid">
            <div class="feature">
                <div class="icon">🛏️</div>
                <h3>Kamar Nyaman</h3>
                <p>Tempat beristirahat dengan suasana yang tenang dan bersih.</p>
            </div>

            <div class="feature">
                <div class="icon">🍽️</div>
                <h3>Restoran</h3>
                <p>Nikmati pilihan hidangan untuk melengkapi waktu menginap.</p>
            </div>

            <div class="feature">
                <div class="icon">📶</div>
                <h3>Wi-Fi Gratis</h3>
                <p>Tetap terhubung untuk kebutuhan pekerjaan maupun hiburan.</p>
            </div>
        </div>
    </section>

    <section class="panorama" id="virtual">
        <div class="eyebrow">EXPLORE BEFORE YOU ARRIVE</div>
        <h2>Jelajahi Hotel dalam Tampilan 360°</h2>
        <p>
            Tidak perlu membayangkan seperti apa kamar pilihanmu.
            Nantinya, kamu bisa melihat panorama ruangan secara interaktif
            sebelum menentukan pilihan.
        </p>
        <a class="gold-button" href="#kamar">Lihat Pilihan Kamar</a>
    </section>

    <footer>
        <strong>StayView 360° Hotel</strong>
        <p>Experience more than just a stay.</p>
        <p>&copy; 2026 StayView 360°. Portfolio project.</p>
    </footer>


<!-- Virtual Tour 360° -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">

<section id="virtual-tour" style="padding: 50px 20px; text-align: center;">
    <h2>Jelajahi Kamar Secara Virtual</h2>
    <p>Geser gambar untuk melihat sekeliling kamar hotel.</p>

    <div id="panorama" style="width: 100%; height: 450px; max-width: 1000px; margin: 25px auto; border-radius: 12px;"></div>
</section>

<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>


<script>
    pannellum.viewer('panorama', {
        default: {
            firstScene: 'kamar',
            autoLoad: true,
            autoRotate: -2,
            showZoomCtrl: true
        },

        scenes: {
            kamar: {
                title: 'Kamar Deluxe',
                type: 'equirectangular',
                panorama: '/images/kamardeluxedouble.png',

                hotSpots: [
                    {
                        pitch: -5,
                        yaw: -90,
                        type: 'scene',
                        text: 'Menuju Kamar Mandi',
                        sceneId: 'kamarMandi'
                    }
                ]
            },

            kamarMandi: {
                title: 'Kamar Mandi',
                type: 'equirectangular',
                panorama: '/images/kamarmandi.jpg',

                hotSpots: [
                    {
                        pitch: -5,
                        yaw: 180,
                        type: 'scene',
                        text: 'Kembali ke Kamar',
                        sceneId: 'kamar'
                    }
                ]
            }
        }
    });
</script>


<style>
    
.booking-section {
    width: calc(100% - 40px);
    max-width: 900px;
    margin: 55px auto;
    padding: 36px;
    background: #fff;
    color: #202923;
    border: 1px solid #e3e9e3;
    border-top: 4px solid #c9a45c;
    border-radius: 16px;
    box-shadow: 0 14px 40px rgba(6, 78, 59, .08);
    font-family: "Segoe UI", Arial, sans-serif;
}

.booking-section h2 {
    text-align: center;
    color: #064e3b;
    font-size: clamp(25px, 3vw, 32px);
    margin-bottom: 10px;
    line-height: 1.3;
}

.booking-section .booking-desc {
    text-align: center;
    color: #707b73;
    margin-bottom: 30px;
    font-size: 14px;
    line-height: 1.8;
}

.booking-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
}

.booking-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 0;
}

.booking-field label {
    color: #34443a;
    font-weight: 700;
    font-size: 13px;
}

.booking-field input,
.booking-field select {
    width: 100%;
    min-height: 47px;
    box-sizing: border-box;
    padding: 12px 14px;
    border: 1px solid #d8e1da;
    border-radius: 9px;
    background: #fbfcfa;
    color: #202923;
    font-family: inherit;
    font-size: 14px;
    outline: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

.booking-field input:focus,
.booking-field select:focus {
    border-color: #064e3b;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(6, 78, 59, .10);
}

.booking-field input::placeholder {
    color: #9ca69e;
}

.booking-submit {
    display: block;
    width: 100%;
    margin-top: 28px;
    padding: 15px 20px;
    background: #064e3b;
    color: #fff;
    border: 1px solid #c9a45c;
    border-radius: 9px;
    font-family: inherit;
    font-size: 14px;
    font-weight: 800;
    cursor: pointer;
    transition: background .2s, transform .2s, box-shadow .2s;
}

.booking-submit:hover:not(:disabled) {
    background: #022c22;
    transform: translateY(-1px);
    box-shadow: 0 7px 18px rgba(6, 78, 59, .16);
}

.booking-submit:disabled {
    opacity: .55;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.booking-section [role="status"] {
    font-size: 13px;
    line-height: 1.6;
    overflow-wrap: anywhere;
}

@media (max-width: 600px) {
    .booking-section {
        width: calc(100% - 24px);
        margin: 35px auto;
        padding: 24px 19px;
        border-radius: 12px;
    }

    .booking-grid {
        grid-template-columns: minmax(0, 1fr);
        gap: 18px;
    }

    .booking-section h2 {
        font-size: 26px;
    }

    .booking-section .booking-desc {
        margin-bottom: 24px;
    }
}

</style>


@if ($errors->any())
    <div style="background:#fee2e2;color:#991b1b;padding:15px;margin:15px 0;border-radius:8px;">
        <strong>Booking gagal:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('booking_success'))
    <div style="max-width:900px;margin:20px auto;padding:18px;background:#e8f7ee;color:#176534;border-radius:10px;">
        {{ session('booking_success') }}
    </div>
@endif


<section class="booking-section" id="booking">
    <h2>Pesan Kamar Anda</h2>

    <p class="booking-desc">
        Nikmati pengalaman menginap bersama StayView 360°
    </p>

     
<form id="bookingForm" action="{{ route('booking.store') }}" method="POST">

    @csrf
        <div class="booking-grid">
            <div class="booking-field">
                <label for="nama">Nama lengkap</label>
                <input id="nama" name="nama" type="text"
                       placeholder="Nama sesuai identitas" required>
            </div>

            <div class="booking-field">
                <label for="telepon">Nomor telepon</label>
                <input id="telepon" name="telepon" type="tel"
                       placeholder="08xxxxxxxxxx" required>
            </div>

            

<div class="booking-field">
    <label for="email">Alamat Email</label>
    <input
        type="email"
        id="email"
        name="email"
        placeholder="nama@email.com"
        required
    >
</div>


            <div class="booking-field">
                <label for="checkin">Check-in</label>
                <input id="checkin" name="checkin" type="date" required>
            </div>

            <div class="booking-field">
                <label for="checkout">Check-out</label>
                <input id="checkout" name="checkout" type="date" required>
            </div>

            <div class="booking-field">
                <label for="tipe_kamar">Tipe kamar</label>
                <select id="tipe_kamar" name="tipe_kamar" required>
                    <option value="">Pilih tipe kamar</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe Double">Deluxe Double</option>
                    <option value="Deluxe Twin">Deluxe Twin</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>

            <div class="booking-field">
                <label for="jumlah_tamu">Jumlah tamu</label>
                <select id="jumlah_tamu" name="jumlah_tamu" required>
                    <option value="1">1 orang</option>
                    <option value="2" selected>2 orang</option>
                    <option value="3">3 orang</option>
                    <option value="4">4 orang</option>
                </select>
            </div>
        </div>

        <button class="booking-submit" type="submit">
            Lanjutkan Pemesanan
        </button>
    </form>
</section>

<script>
    const tanggalMasuk = document.getElementById('checkin');
    const tanggalKeluar = document.getElementById('checkout');

    const hariIni = new Date();
    const tanggalLokal = new Date(
        hariIni.getTime() - hariIni.getTimezoneOffset() * 60000
    ).toISOString().split('T')[0];

    tanggalMasuk.min = tanggalLokal;
    tanggalKeluar.min = tanggalLokal;

    tanggalMasuk.addEventListener('change', function () {
        tanggalKeluar.min = this.value || tanggalLokal;

        if (tanggalKeluar.value && tanggalKeluar.value <= this.value) {
            tanggalKeluar.value = '';
        }
    });

    document.getElementById('bookingForm').addEventListener('submit', function (e) {
        
        if (tanggalKeluar.value <= tanggalMasuk.value) {
            alert('Tanggal check-out harus setelah tanggal check-in.');
            return;
        }

        
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[action$="/booking"]');

    if (!form) return;

    const tipeKamar = form.querySelector('[name="tipe_kamar"]');
    const checkin = form.querySelector('[name="checkin"]');
    const checkout = form.querySelector('[name="checkout"]');

    const tombolPesan = form.querySelector(
        'button[type="submit"], input[type="submit"], button:not([type])'
    );

    if (!tipeKamar || !checkin || !checkout || !tombolPesan) {
        console.error('Elemen formulir booking belum ditemukan.');
        return;
    }

    const pesan = document.createElement('div');
    pesan.setAttribute('role', 'status');
    pesan.setAttribute('aria-live', 'polite');
    pesan.style.cssText =
        'display:none; margin:15px 0; padding:14px; border-radius:8px;';

    form.insertBefore(pesan, tombolPesan);

    tombolPesan.disabled = true;

    let nomorPermintaan = 0;
    let sudahTersedia = false;

    function tampilkanPesan(teks, berhasil) {
        pesan.style.display = 'block';
        pesan.textContent = teks;
        pesan.style.background = berhasil ? '#e8f5e9' : '#ffebee';
        pesan.style.color = berhasil ? '#1b5e20' : '#b71c1c';
    }

    async function cekKetersediaan() {
        const idPermintaan = ++nomorPermintaan;
        sudahTersedia = false;
        tombolPesan.disabled = true;

        if (!tipeKamar.value || !checkin.value || !checkout.value) {
            pesan.style.display = 'none';
            return;
        }

        if (checkout.value <= checkin.value) {
            tampilkanPesan(
                'Tanggal check-out harus setelah tanggal check-in.',
                false
            );
            return;
        }

        tampilkanPesan('Sedang memeriksa ketersediaan kamar...', false);

        const url = new URL(
            @json(route('booking.availability')),
            window.location.origin
        );

        url.searchParams.set('tipe_kamar', tipeKamar.value);
        url.searchParams.set('checkin', checkin.value);
        url.searchParams.set('checkout', checkout.value);

        try {
            const response = await fetch(url, {
                headers: { 'Accept': 'application/json' }
            });

            const hasil = await response.json();

            if (idPermintaan !== nomorPermintaan) return;

            if (!response.ok) {
    const detailError =
        hasil.message ||
        Object.values(hasil.errors || {}).flat()[0] ||
        `HTTP ${response.status}`;

    throw new Error(detailError);
}

            tampilkanPesan(hasil.pesan, hasil.tersedia);

            sudahTersedia = hasil.tersedia;
            tombolPesan.disabled = !hasil.tersedia;

        } catch (error) {
    if (idPermintaan !== nomorPermintaan) return;

    tampilkanPesan(
        `Ketersediaan gagal diperiksa: ${error.message}`,
        false
    );

    tombolPesan.disabled = true;
}
    }

    [tipeKamar, checkin, checkout].forEach(function (input) {
        input.addEventListener('change', cekKetersediaan);
        input.addEventListener('input', cekKetersediaan);
    });

    form.addEventListener('submit', function (event) {
        if (!sudahTersedia) {
            event.preventDefault();
            cekKetersediaan();
        }
    });
});
</script>


</body>
</html>
