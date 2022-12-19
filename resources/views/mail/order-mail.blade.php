@component('mail::message')
# Terimakasih telah melakukan pemesanan Membership {{ config('app.name') }}

Satu langkah lagi untuk menyelesaikan pesanan ini, 

Mohon lakukan pembayaran ke Rekening berikut:

Rekening: {{ $bank}}

VA Number: {{ $va }}

Nominal: {{ number_format($transaksi['nominal'],0,',','.') }}

@component('mail::button', ['url' => route('checkout.konfirmasi', $transaksi['code']) ])
Konfirmasi Pembayaran
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
