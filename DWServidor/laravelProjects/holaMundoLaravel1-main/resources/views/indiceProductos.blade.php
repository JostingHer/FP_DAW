<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tabla de Productos</h1>
    <table>
        <tr>
            <th>nombre</th>
            <th>descripccion</th>
            <th>precio</th>
            <th>stock</th>
        </tr>
        @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->stock}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>