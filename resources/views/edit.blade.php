@extends('app')
@section('content')

    <div class="container p-5 mt-3">
       
        <div class="card p-5">
            <form action="{{url('update/'.$user->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input type="text" class="form-control" value="{{$user->firstName}}" name="firstName">
                </div>
                <div class="form-group">
                    <label for="LastName">Last Name</label>
                    <input type="text" class="form-control" value="{{$user->lastName}}" name="lastName">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" value="{{$user->email}}" name="email" disabled>
                </div>
                <button type="submit" class="btn btn-success form-control">Update</button>
            </form>
        </div>
    </div>
@endsection