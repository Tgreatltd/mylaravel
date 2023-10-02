@extends('app');
<title>Dashboard</title>

@section('content')
<h1>Dashboard</h1>
@guest
    <a href="{{route('login')}}">Login</a>
@endguest

@auth
    <a href="{{route('logout')}}">Logout</a>
    {{-- <a href="">Logout</a> --}}
@endauth

@php
    $userName=auth()->user();
@endphp
    <h1>welcome {{$userName->firstName}} {{$userName->lastName}}</h1>
    @csrf
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Time Created</th>
                    <th>Time Updated</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @foreach ($users as $usa)
                        <tr>
                            <td>{{$usa->firstName}}</td>
                            <td>{{$usa->lastName}}</td>
                            <td>{{$usa->email}}</td>
                            <td>{{$usa->created_at}}</td>
                            <td>{{$usa->updated_at}}</td>
                            <td class="d-flex">
                                <form action="{{url('edit/'.$usa->id)}}"  method="GET">
                                    <button  class="btn btn-success m2-5">Edit</button>
                                </form>
                                <form action="{{url('del/'.$usa->id)}}">
                                    <button class="btn btn-danger  ">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <div>{{$mess}}</div>
                    @endforeach
                </tbody>
            </thead>
        </table>
        {{-- <button  class="btn btn-success"><a href="{{url('edit/'.$usa->id)}}">Edit</a></button> --}}
        {{-- <a href="{{url('del/'.$usa->id)}}">Delete</a> --}}
    
        {{-- {{ $users->links() }} --}}
    </div>
@endsection