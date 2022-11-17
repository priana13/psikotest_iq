@extends('layouts.admin_full')

@section('main-content')

@livewire('member.ujian' , 
[
    'examid' => $id,
    'examEvent' => $exam_event
])


@endsection