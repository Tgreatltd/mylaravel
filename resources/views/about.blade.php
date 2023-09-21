{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Hello {{$name}}{{$age}}</div>
</body>
</html> --}}

@extends('app')

@section('content')
   <h1>WELCOME to about page</h1> 
   <h1>you can't logging because you are not an admin</h1> 
   
@endsection