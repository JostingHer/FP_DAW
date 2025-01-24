<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>

    <style>
        h1 {
            text-align: center;
        }

        body {
            width: 1000px;
            margin: 0px auto;
        }

        .center {
            padding: 10px;
            margin: auto;
            width: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

         

    </style>
</head>
<body>
    <h1>Tabla de usuarios</h1>
    <a href={{route('rutaNuevoUsuario')}}>Agregar usuario</a>
    

    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->edad}}</td>
                <td><a href="{{route('rutaActualizarUsuario', $usuario->id)}}">Actualizar usuario</a></td>
                <td><a href="{{route('rutaBorrarUsuario', $usuario->id)}}">Eliminar usuario</a></td>
            </tr>
        @endforeach
    </table>
    <div class="center">
        {{$usuarios->links()}}
    </div>
</body>
</html>