@extends('app');
<title>login</title>
@section('content')

  <div class="container pt-5">
    @if (session()->has('errorlogin')){
        <h1>{{session()->get('errorlogin')}}</h1>
    }
        
    @endif
    <div class="card p-5">
        <form action="{{route('signin')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" name="password">
            </div>
            <button class="form-control btn btn-success mt-3" type="login">Login</button>
        </form>
    </div>
  </div>  
@endsection