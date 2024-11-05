<?php
session_start(); // Asegúrate de que la sesión esté iniciada
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Buscar Productos - Mercado Sparking</title>
  <link rel="stylesheet" href="./styles/normalize.css" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/form.css" />
</head>

<body>
  <header class="header">
    <h1 class="header__title"><a href="./home.php">Mercado Sparking</a></h1>
    <ul class="header__nav">
      <li><a class="btn" href="?method=home">Inicio</a></li>
      <li><a class="btn" href="?method=logout">Cerrar sesión</a></li>
    </ul>
  </header>

  <div class="container">
    <div class="container-main">
      <section class="section__head">
        <h2>Resultados de la búsqueda</h2>
      </section>

      <section class="search">
        <form class="form-search" action="main.php" method="post">
          <input type="hidden" name="method" value="searchProduct" />
          <label for="product">Buscar producto:</label>
          <input class="form-search__bar" type="search" id="product" name="q" placeholder="Buscar producto..." required />
          <input class="form-search__action btn" type="submit" value="Buscar" />
        </form>
      </section>

      <main class="main-table">
        <table class="table-desktop">
          <thead class="table-desktop__head">
            <tr>
              <th>Producto</th>
              <th>Stock</th>
              <th>Precio/Unidad</th>
              <th>Añadido por</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody class="table-desktop__body">
            <?php
            // Obtener productos filtrados de la cookie
            $filteredProducts = isset($_COOKIE['filtered_products']) ? json_decode($_COOKIE['filtered_products'], true) : [];
            if (empty($filteredProducts)) {
              echo "<tr><td colspan='5'>No se encontraron productos que coincidan con la búsqueda.</td></tr>";
            } else {
              foreach ($filteredProducts as $index => $product) {
                echo "<tr>
                                          <td>" . htmlspecialchars($product['name']) . "</td>
                                          <td>" . htmlspecialchars($product['stock']) . "</td>
                                          <td>" . htmlspecialchars($product['pricing']) . "</td>
                                          <td>" . htmlspecialchars($product['added_by']) . "</td>
                                          <td>
                                              <a class='btn-delete' href='?method=deleteProduct&index={$index}'>Eliminar</a>
                                          </td>
                                        </tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </main>
    </div>
  </div>
</body>

</html>