@extends('layouts.auth')

@section('main-content')
<div class="login-wrapper">

    {{-- Left decorative panel --}}
    <div class="login-panel">
        <div class="panel-orb panel-orb-1"></div>
        <div class="panel-orb panel-orb-2"></div>
        <div class="panel-orb panel-orb-3"></div>

        <div class="panel-content">
            <div class="panel-logo">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                    <rect width="44" height="44" rx="12" fill="rgba(255,255,255,0.15)"/>
                    <path d="M12 22C12 16.477 16.477 12 22 12s10 4.477 10 10-4.477 10-10 10S12 27.523 12 22z" stroke="white" stroke-width="2" fill="none"/>
                    <path d="M22 17v5l3 3" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span class="panel-logo-text">{{ config('app.name', 'AppName') }}</span>
            </div>

            <div class="panel-tagline">
                <h2>Selamat Datang<br>Kembali</h2>
                <p>Jaga kerahasiaan data Anda</p>
            </div>

            <div class="panel-features">
                <div class="feature-item">
                    {{-- <div class="feature-dot"></div> --}}
                    {{-- <span>Keamanan data terjamin</span> --}}
                </div>
                <div class="feature-item">
                    {{-- <div class="feature-dot"></div>
                    <span>Akses kapan saja & di mana saja</span> --}}
                </div>
                <div class="feature-item">
                    {{-- <div class="feature-dot"></div>
                    <span>Dashboard terintegrasi</span> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Right form panel --}}
    <div class="login-form-side">
        <div class="form-container">

            <div class="form-header">
                <div class="form-header-badge">PORTAL LOGIN</div>
                <h1>Masuk ke Akun</h1>
                <p>Gunakan kredensial Anda untuk mengakses sistem</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="login-form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="field-group">
                    <label for="login">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Nama Pengguna
                    </label>
                    <div class="input-wrap">
                        <input type="text"
                               id="login"
                               class="form-input {{ $errors->has('login') ? 'input-error' : '' }}"
                               name="login"
                               placeholder="Masukkan username Anda"
                               value="{{ old('login') }}"
                               required
                               autofocus>
                    </div>
                    @error('login')
                        <p class="error-msg">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="field-group">
                    <label for="password">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Password
                    </label>
                    <div class="input-wrap input-wrap-pass">
                        <input type="password"
                               id="password"
                               class="form-input {{ $errors->has('password') ? 'input-error' : '' }}"
                               name="password"
                               placeholder="Masukkan password Anda"
                               required>
                        <button type="button" class="toggle-pass" onclick="togglePassword()" aria-label="Tampilkan password">
                            <svg id="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="error-msg">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Captcha --}}
                <div class="field-group">
                    @livewire('captcha')
                </div>

                <button type="submit" class="btn-login">
                    <span>Masuk Sekarang</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>

            </form>

            <div class="form-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="footer-link">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Lupa Password?
                    </a>
                @endif

                @if (Route::has('register'))
                    {{-- <a href="{{ route('register') }}" class="footer-link footer-link-register">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                        Buat Akun Baru
                    </a> --}}
                @endif
            </div>

        </div>
    </div>

</div>

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --blue-50: #E6F1FB;
    --blue-100: #B5D4F4;
    --blue-200: #85B7EB;
    --blue-400: #378ADD;
    --blue-600: #185FA5;
    --blue-700: #0F4A84;
    --blue-800: #0C447C;
    --blue-900: #042C53;
    --white: #ffffff;
    --gray-50: #F8FAFC;
    --gray-100: #F1F5F9;
    --gray-200: #E2E8F0;
    --gray-400: #94A3B8;
    --gray-600: #64748B;
    --gray-800: #1E293B;
    --red-500: #EF4444;
    --red-50: #FEF2F2;
}

body {
    font-family: 'Nunito', sans-serif;
    background: var(--gray-100);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-wrapper {
    display: flex;
    width: 100%;
    max-width: 960px;
    min-height: 600px;
    background: var(--white);
    border-radius: 24px;
    box-shadow: 0 25px 60px rgba(6, 60, 120, 0.18), 0 8px 24px rgba(6, 60, 120, 0.1);
    overflow: hidden;
    margin: 2rem;
    animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) both;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ─── Left Panel ─── */
.login-panel {
    position: relative;
    flex: 0 0 42%;
    background: linear-gradient(145deg, var(--blue-700) 0%, var(--blue-900) 60%, #021D3A 100%);
    padding: 3rem 2.5rem;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.panel-orb {
    position: absolute;
    border-radius: 50%;
    opacity: 0.12;
}
.panel-orb-1 {
    width: 320px; height: 320px;
    background: var(--blue-400);
    top: -100px; right: -100px;
}
.panel-orb-2 {
    width: 200px; height: 200px;
    background: var(--white);
    bottom: -60px; left: -60px;
}
.panel-orb-3 {
    width: 120px; height: 120px;
    background: var(--blue-200);
    bottom: 160px; right: 30px;
    opacity: 0.07;
}

.panel-content {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.panel-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: auto;
}

.panel-logo-text {
    color: var(--white);
    font-size: 1.15rem;
    font-weight: 700;
    letter-spacing: 0.02em;
}

.panel-tagline {
    margin: auto 0 2.5rem;
}

.panel-tagline h2 {
    color: var(--white);
    font-size: 2rem;
    font-weight: 800;
    line-height: 1.25;
    margin-bottom: 1rem;
}

.panel-tagline p {
    color: rgba(255,255,255,0.65);
    font-size: 0.9rem;
    line-height: 1.7;
}

.panel-features {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.8);
    font-size: 0.85rem;
}

.feature-dot {
    width: 7px; height: 7px;
    background: var(--blue-200);
    border-radius: 50%;
    flex-shrink: 0;
}

/* ─── Right Form Side ─── */
.login-form-side {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem 3.5rem;
    background: var(--white);
}

.form-container {
    width: 100%;
    max-width: 380px;
}

.form-header {
    margin-bottom: 2rem;
}

.form-header-badge {
    display: inline-block;
    background: var(--blue-50);
    color: var(--blue-600);
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    padding: 4px 10px;
    border-radius: 100px;
    margin-bottom: 12px;
}

.form-header h1 {
    color: var(--gray-800);
    font-size: 1.6rem;
    font-weight: 800;
    margin-bottom: 6px;
    line-height: 1.2;
}

.form-header p {
    color: var(--gray-400);
    font-size: 0.875rem;
    line-height: 1.5;
}

/* ─── Fields ─── */
.field-group {
    margin-bottom: 1.25rem;
}

.field-group label {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--gray-600);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 8px;
}

.input-wrap {
    position: relative;
}

.form-input {
    width: 100%;
    padding: 0.75rem 1rem;
    font-family: 'Nunito', sans-serif;
    font-size: 0.9rem;
    color: var(--gray-800);
    background: var(--gray-50);
    border: 1.5px solid var(--gray-200);
    border-radius: 10px;
    transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    outline: none;
    -webkit-appearance: none;
}

.form-input::placeholder { color: var(--gray-400); }

.form-input:focus {
    border-color: var(--blue-400);
    background: var(--white);
    box-shadow: 0 0 0 3px rgba(55, 138, 221, 0.12);
}

.form-input.input-error {
    border-color: var(--red-500);
    background: var(--red-50);
}

.input-wrap-pass .form-input {
    padding-right: 44px;
}

.toggle-pass {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: var(--gray-400);
    padding: 4px;
    display: flex;
    align-items: center;
    transition: color 0.2s;
}
.toggle-pass:hover { color: var(--blue-600); }

.error-msg {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--red-500);
    font-size: 0.78rem;
    margin-top: 6px;
}

/* ─── Submit Button ─── */
.btn-login {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0.85rem 1.5rem;
    background: linear-gradient(135deg, var(--blue-600) 0%, var(--blue-800) 100%);
    color: var(--white);
    font-family: 'Nunito', sans-serif;
    font-size: 0.9rem;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    letter-spacing: 0.02em;
    transition: transform 0.18s, box-shadow 0.18s, filter 0.18s;
    box-shadow: 0 4px 16px rgba(15, 74, 132, 0.35);
    margin-top: 0.5rem;
}

.btn-login:hover {
    filter: brightness(1.08);
    transform: translateY(-1px);
    box-shadow: 0 8px 24px rgba(15, 74, 132, 0.4);
}

.btn-login:active {
    transform: translateY(0);
    filter: brightness(0.97);
}

/* ─── Footer ─── */
.form-footer {
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.footer-link {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--gray-400);
    font-size: 0.82rem;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
}

.footer-link:hover { color: var(--blue-600); }

.footer-link-register {
    color: var(--blue-600);
    background: var(--blue-50);
    padding: 6px 14px;
    border-radius: 100px;
}

.footer-link-register:hover {
    background: var(--blue-100);
    color: var(--blue-800);
}

/* ─── Responsive ─── */
@media (max-width: 768px) {
    .login-wrapper {
        flex-direction: column;
        margin: 1rem;
        border-radius: 16px;
    }
    .login-panel {
        flex: none;
        padding: 2rem;
        min-height: auto;
    }
    .panel-tagline h2 { font-size: 1.5rem; }
    .panel-features { display: none; }
    .panel-tagline { margin: 1rem 0; }
    .panel-logo { margin-bottom: 0; }
    .login-form-side { padding: 2rem 1.5rem; }
}
</style>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eye-icon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    } else {
        input.type = 'password';
        icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    }
}
</script>
@endsection