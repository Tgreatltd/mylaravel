@extends('app')
@section('content')
     
<div class="container bg-danger p-5 mt-3">
  <div class="card p-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif

   @if(session('error'))
   <div class="alert alert-success">
       {{ session('error') }}
   </div>
  @endif
    <form action="{{route('stores')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="email" class="form-control">
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pass">Email</label>
            <input type="text" name="pass" class="form-control">
            @error('pass')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
     </form>
  </div>
</div>

@endsection