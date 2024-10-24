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
            $products = json_decode($_COOKIE['products'], true);
            foreach ($products as $index => $product) {

                echo "
                    <tr>;
                    <td>$index - $product->name </td>
                    <td>$producto->stock </td>
                    <td>$producto->pricing €</td>
                    <td>Profe</td>
                    <td>
                        <button class='btn-delete' href='?method=deleteProduct&index=$index'>Eliminar</button>
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

        echo "
  <table class='table__mobile'>
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
                  ";
    }
    ?>

</main>