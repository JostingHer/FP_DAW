<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('rutaUpdateUsuario')}}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{$id}}">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"><br>
        <label for="email">Email</label>
        <input type="text" name="email"><br>
        <label for="edad">Edad</label>
        <input type="number" name="edad"><br>

        <button type="submit">Actualizar usuario</button>
    </form>
</body>
</html>