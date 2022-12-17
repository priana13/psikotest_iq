@component('mail::message')
# Terimakasih telah melakukan pemesanan Membership {{ config('app.name') }}

Satu langkah lagi untuk menyelesaikan pesanan ini, 

Mohon lakukan pembayaran ke Rekening berikut:

Rekening: {{ $transaksi['payment_type'] }}

VA Number: {{ $transaksi['va_number'] }}

Nominal: {{ $transaksi['nominal'] }}

@component('mail::button', ['url' => route('checkout.konfirmasi', $transaksi['code']) ])
Konfirmasi Pembayaran
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
