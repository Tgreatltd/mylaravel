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
            <label for="pass">Password</label>
            <input type="text" name="pass" class="form-control">
            @error('pass')
                <div class="text-danger">{{$message='The password field is required'}}</div>
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

<div class="container mt-5">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>IMAGE</th>
                <th>PASSWORD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->image}}</td>
                <td>{{$user->pass}}</td>
            </tr>  
            @endforeach
        </tbody>
    </table>
</div>
{{-- {{ dd($userImage) }}
<img src="{{ asset('storage/images/' . $userImage) }}" alt="Image">
<div>
    <img src="{{ asset('storage/images/'. $userImage) }}">
</div> --}}

    {{-- <div>
        <img src="{{ asset('storage/images/9BG5qMVfCdZEUCVSiDdx5LGovDcl4iuAA4L9F4SY.jpg') }}" alt="Image">
    </div> --}}

@endsection