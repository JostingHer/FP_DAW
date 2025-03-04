<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf

        <label for="titulo">titulo</label>
        <input type="text" name="titulo"><br>
        <label for="contenido">contenido</label>
        <input type="text" name="contenido"><br>
        <label for="autor">Autor</label>
        <input type="text" name="autor"><br>

        <button type="submit">Agregar POST</button>
        @error('titulo')
            {{$message}}<br>
        @enderror
        @error('contenido')
            {{$message}}<br>
        @enderror
        @error('autor')
            {{$message}}<br>
        @enderror
    </form>
</body>
</html>