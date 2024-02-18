@extends('layouts.admin_full')

@section('main-content')

<div class="row mb-3">
    <img class="m-auto" src="/img/credit-card.png" alt="">
</div>


@livewire('checkout.thanks.show', [
    'transaksi' => $transaction
])

@endsection