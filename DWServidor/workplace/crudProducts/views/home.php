<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=h1, initial-scale=1.0" />
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="./styles/normalize.css" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/sidebar.css" />


</head>

<body>


    <header class="container header">
        <h2 class="header__title">Mercado Sparking</h2>
        <div class="header__user">
            <span><a href="/">Profe user</a> |
                <a href="/" title="cerrar">Cerrar sesion</a></span>
        </div>

        <nav class="menu">
            <a class="menu__link" href="#">Registrar</a>

            <a class="menu__link" href="#">Buscar</a>

            <a class="menu__link" href="#">Total</a>
        </nav>

    </header>


    <form action="?method=addProduct" method="post">

        <label for="name">Nombre</label>
        <input type="text" name="name"> <br>

        <label for="stock">Stock</label>
        <input type="text" name="stock"> <br>

        <label for="pricing">Precio</label>
        <input type="text" name="pricing"> <br>

        <input type="submit">
    </form>

    <?php
    require("tableProducts.php")
    ?>


    <a href="?method=empty">Borrar lista de productos</a>


</body>

</html>