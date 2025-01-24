<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo</title>
</head>
<body>

    @foreach($personas as $persona)
    <p>{{ $persona }}</p>
    @endforeach
    
</body>
</html>