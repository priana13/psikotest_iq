@component('mail::message')
# Terimakasih telah melakukan pemesanan Membership {{ config('app.name') }}

Satu langkah lagi untuk menyelesaikan pesanan ini, 

Mohon lakukan pembayaran ke Rekening berikut:

Rekening: {{ $data['payment_type'] }}
VA Number: {{ $data['va_number'] }}
Nominal: {{ $data['nominal'] }}

@component('mail::button', ['url' => {{ route('checkout.konfirmasi', $data['code']) }}])
Konfirmasi Pembayaran
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
