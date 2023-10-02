@extends('app')
@section('content')
     
<div class="container bg-danger p-5 mt-3">
  <div class="card p-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
    <form action="{{route('stores')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" accept="image/*">
            @error('image')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
     </form>
  </div>
</div>

@endsection