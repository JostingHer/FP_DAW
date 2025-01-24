<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tabla de Pedidos</h1>
    <table>
        <tr>
            <th>usuarioId</th>
            <th>fechaPedido</th>
            <th>estado</th>
        </tr>
        @foreach ($pedidos as $pedido)
            <tr>
                <td>{{$pedido->usuario_id}}</td>
                <td>{{$pedido->fecha_pedido}}</td>
                <td>{{$pedido->estado}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>