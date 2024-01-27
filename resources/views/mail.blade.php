<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
    $user=auth()->user();
@endphp
    <div>{{$details}} {{$user->firstName}} {{$user->lastName}}<</div>
</body>
</html>