{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Hello World</div>
</body>
</html> --}}
@extends('app')

@section('content')
   <h1>WELCOME PAGE</h1> 
   <a href="{{route('about')}}">To about</a>
@endsection