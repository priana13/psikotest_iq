@extends('layouts.admin_full')

@section('main-content')

<div class="row mb-3">
    <img class="m-auto" src="img/credit-card.png" alt="">
</div>

<div class="row">

    <div class="col-md-9 m-auto">

        @livewire('checkout.checkout-show')
          
    </div>
</div>



@endsection