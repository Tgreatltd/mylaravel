@extends('app')
@php
    $user=auth()->user();
@endphp
@section('content')

    <h1>WELCOME {{$user->firstName}}</h1>
@endsection