<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Mercado Sparking</title>
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
        <h2>Bienvenido <span>Josting</span> &#128075;</h2>
        <ul>
          <li><a class="btn" href="?method=addProductPage">Agregar producto</a></li>
          <li><a class="btn" href="?method=searchPage">Buscar producto</a></li>
          <li><a class="btn" href="?method=totalValue">Valor de productos</a></li>
        </ul>
      </section>

      <section class="search">
        <form class="form-search" action="?method=searchProduct" method="get">
          <label for="product">Haz una búsqueda entre todos los productos:</label>
          <input class="form-search__bar" type="search" id="product" name="q" required />
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
            $products = isset($_COOKIE['filtered_products']) ? json_decode($_COOKIE['filtered_products'], true) : [];
            foreach ($products as $index => $product) {
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
            ?>
          </tbody>
        </table>
        <aside>
          <ul>
            <li>Todos los miembros registrados:</li>
            <?php
            $users = isset($_COOKIE['users']) ? json_decode($_COOKIE['users'], true) : [];
            foreach ($users as $user) {
              echo "<li>" . htmlspecialchars($user['email']) . "</li>";
            }
            ?>
          </ul>
        </aside>
      </main>
    </div>
  </div>
</body>

</html>