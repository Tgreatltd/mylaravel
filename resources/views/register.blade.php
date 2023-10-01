@extends('app');
@section('content')
 <div class="container mt-3 p-5">
    @if (session()->has('success')){
        <h1>{{session()->get('success')}}</h1>
    }
        
    @endif
    <div class="card p-5 mt-3">
        <form action="{{route('signup')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="firstName">FirstName</label>
                <input type="text" class="form-control" name="firstName" value="{{old('firstName')}}">
                @error('firstName')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastName">lastName</label>
                <input type="text" class="form-control" name="lastName" value="{{old('lastName')}}">
                @error('lastName')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password">
                @error('password')
                    <small class="text-danger">{{$message}}</small>
                    <small class="text-secondary"></small>
                @enderror
            </div>
            <button name="submit" class="btn btn-success form-control">Submit</button>
        </form>
    </div>
 </div>
    
@endsection