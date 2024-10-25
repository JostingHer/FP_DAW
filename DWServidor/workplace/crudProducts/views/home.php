<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=h1, initial-scale=1.0" />
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="./views/styles/normalize.css" />
    <link rel="stylesheet" href="./views/styles/style.css" />
    <link rel="stylesheet" href="./views/styles/form.css" />
    <link rel="stylesheet" href="./views/styles/sidebar.css" />


</head>

<body>


    <header class="container header">
        <h2 class="header__title">Mercado Sparking</h2>
        <div class="header__user">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg><?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : 'Cookie no establecida'; ?>
                |
                <a href="/" title="cerrar">Cerrar sesion</a></span>
        </div>


        <nav class="menu">
            <a class="menu__link" href="#">Registrar</a>

            <a class="menu__link" href="#">Buscar</a>

            <a class="menu__link" href="#">Total</a>
        </nav>

    </header>


    <form action="?method=addProduct" method="post" class="form">

        <div class="form__field">
            <label for="name">Nuevo producto</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form__field">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="1">
        </div>
        <div class="form__field">
            <label for="pricing">Precio</label>
            <input type="number" name="pricing" id="pricing" min="1">
        </div>




        <input class="form__submit" type="submit" value="Agregar">
    </form>

    <main class="container">
        <table class="table__desktop">
            <thead class="table__desktop_head">
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Precio/Unidad</th>
                    <th>Añadido por</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table__desktop_body">

                <?php
                $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];

                foreach ($products as $index => $product) {
                    echo "
                <tr>
                    <td>{$index} - {$product['name']}</td>
                    <td>{$product['stock']}</td>
                    <td>{$product['pricing']} €</td>
                    <td>{$product['added_by']}</td>
                    <td>
                        <a class='btn-delete' href='?method=deleteProduct&index=$index'>Eliminar</a>
                    </td>
                </tr>
                ";
                }
                ?>
            </tbody>
        </table>

        <?php
        $products = json_decode($_COOKIE['products'], true);
        foreach ($products as $index => $product) {

            echo `
  <table class="table__mobile">
        <tbody>
            <tr>
                <td>Producto:</td>
                <td>$product</td>
            </tr>
            <tr>
                <td>Stock:</td>
                <td>122</td>
            </tr>
            <tr>
                <td>Precio/Unidad</td>
                <td>10€</td>
            </tr>
            <tr>
                <td>Añadido por:</td>
                <td>10€</td>
            </tr>
            <tr>
                <td>Acciones</td>
                <td>
                    <button class='btn-delete' href='?method=delete&index=$index'>Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
                  `;
        }
        ?>

    </main>


    <a href="?method=empty">Borrar lista de productos</a>


</body>

</html>