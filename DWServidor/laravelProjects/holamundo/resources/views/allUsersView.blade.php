<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach ($data as $item)
        <p>{{$item->id}} -{{$item->nombre}} - {{$item->email}} - {{$item->edad}} </h1>
    @endforeach

    
</body>
</html>