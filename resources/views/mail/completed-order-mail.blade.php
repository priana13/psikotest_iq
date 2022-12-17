@component('mail::message')
# Selamat, Pemesanan Paket Membership Anda Sukses

Paket Membership psikotes Anda telah Aktif, silahkan melakukan login untuk mengakses Ujian Psikotes.

Semoga Sukses.

@component('mail::button', ['url' => "https://arstamedia.com/login"])
Login Sekarang
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
