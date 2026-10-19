
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login -ELFAR SISTEM</title>
    <style>
        
* {
    box-sizing: border-box;
}

:root {
    --emerald: #064e3b;
    --emerald-dark: #022c22;
    --gold: #c9a45c;
    --gold-hover: #b38b42;
    --text: #1f2937;
    --muted: #64748b;
}

body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Segoe UI", Arial, sans-serif;
    background:
        radial-gradient(ellipse at top left, rgba(201, 164, 92, .17), transparent 38%),
        linear-gradient(135deg, #022c22 0%, #064e3b 55%, #0f3d30 100%);
    padding: 24px;
}

.login-card {
    position: relative;
    width: 100%;
    max-width: 420px;
    padding: 38px;
    overflow: hidden;
    background: #fff;
    border: 1px solid rgba(201, 164, 92, .45);
    border-top: 4px solid var(--gold);
    border-radius: 18px;
    box-shadow: 0 24px 65px rgba(0, 0, 0, .25);
    animation: appear .45s ease-out;
}

.logo {
    display: inline-block;
    color: var(--emerald);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2.5px;
    padding: 8px 12px;
    background: #ecfdf5;
    border: 1px solid #d1fae5;
    border-radius: 7px;
}

h1 {
    color: var(--emerald);
    font-size: 28px;
    margin: 24px 0 8px;
    letter-spacing: -.5px;
}

p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.7;
}

label {
    display: block;
    margin: 21px 0 8px;
    color: var(--text);
    font-size: 13px;
    font-weight: 700;
}

input {
    display: block;
    width: 100%;
    padding: 13px 14px;
    border: 1px solid #d7e0db;
    border-radius: 9px;
    background: #fbfdfb;
    color: var(--text);
    font-family: inherit;
    font-size: 14px;
    outline: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

input::placeholder {
    color: #9ca3af;
}

input:focus {
    border-color: var(--emerald);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(6, 78, 59, .12);
}

button {
    width: 100%;
    padding: 14px;
    margin-top: 28px;
    border: 1px solid var(--gold);
    border-radius: 9px;
    background: var(--emerald);
    color: #fff;
    font-family: inherit;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    transition: background .2s, transform .2s, box-shadow .2s;
}

button:hover {
    background: var(--emerald-dark);
    box-shadow: 0 6px 18px rgba(6, 78, 59, .2);
    transform: translateY(-1px);
}

button:focus-visible {
    outline: 3px solid rgba(201, 164, 92, .65);
    outline-offset: 3px;
}

.error {
    padding: 11px 13px;
    color: #b42318;
    background: #fef2f2;
    border: 1px solid #fecaca;
    border-radius: 8px;
    font-size: 13px;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

@keyframes appear {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 480px) {
    body {
        padding: 16px;
    }

    .login-card {
        padding: 28px 23px;
        border-radius: 14px;
    }

    h1 {
        font-size: 25px;
    }
}

@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation: none !important;
        transition: none !important;
    }
}

    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">ELFAR JUNIOR</div>
        <h1>Admin Login</h1>
        <p>Masuk untuk mengelola reservasi hotel.</p>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <label for="email">Email Admin</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="admin@stayview360.com"
                required
                autocomplete="username"
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required
                autocomplete="current-password"
            >

            <button type="submit">Masuk ke Dashboard</button>
        </form>
    </div>
</body>
</html>
