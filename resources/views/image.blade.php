@extends('app')
@section('content')
     
<div class="container bg-danger p-5 mt-3">
  <div class="card p-5">
    <form action="{{route('storeImage')}}" method="POST">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image">
        </div>
        <button class="btn btn-success mt-3">Submit</button>
     </form>
  </div>
</div>

@endsection