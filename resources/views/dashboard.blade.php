@extends('app');
<title>Dashboard</title>

@section('content')
<h1>Dashboard</h1>
@guest
    <a href="">Login</a>
@endguest

@auth
    <a href="{{route('logout')}}">Logout</a>
    {{-- <a href="">Logout</a> --}}
@endauth

@php
    $user=auth()->user()
@endphp
    <h1>welcome {{$user->firstName}} {{$user->lastName}}</h1>
@endsection