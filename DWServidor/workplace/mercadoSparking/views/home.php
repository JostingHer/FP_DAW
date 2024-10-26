<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=h1, initial-scale=1.0" />
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="../styles/normalize.css" />
    <link rel="stylesheet" href="../styles/form.css" />


    <link rel="stylesheet" href="../styles/sidebar.css" />

    <link rel="stylesheet" href="../styles/style.css" />


    <style>
        .table__desktop_head {
            background-color: var(--color__green__light);
            padding: 1rem 2rem;
            border-radius: 20px;
        }
    </style>

</head>

<body>

    <?php
    require("../components/header.php")
    ?>


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
                <tr>
                    <td>{$index} - {$product['name']}</td>
                    <td>{$product['stock']}</td>
                    <td>{$product['pricing']} €</td>
                    <td>{$product['added_by']}</td>
                    <td>
                        <a class='btn-delete' href='?method=deleteProduct&index=$index'>Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>{$index} - {$product['name']}</td>
                    <td>{$product['stock']}</td>
                    <td>{$product['pricing']} €</td>
                    <td>{$product['added_by']}</td>
                    <td>
                        <a class='btn-delete' href='?method=deleteProduct&index=$index'>Eliminar</a>
                    </td>
                </tr>

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