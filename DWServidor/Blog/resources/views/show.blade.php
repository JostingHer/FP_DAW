<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Pedidos</h1>
        <table class="table table-bordered">
            <thead >
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Autor</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $post->titulo }}</td>
                        <td>{{ $post->contenido }}</td>
                        <td>{{ $post->autor }}</td>
                        <td>{{ $post->fecha }}</td>
                    </tr>
            </tbody>
        </table>

        <a href="{{ route('posts.index', $post->id) }}">Volver al listado</a>
     
    </div>
</body>
</html>