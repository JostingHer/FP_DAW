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
    <h1 class="header__title"><a href="./index.php">Mercado Sparking</a></h1>
    <ul class="header__nav">
      <li><a class="btn" href="?method=home">Inicio</a></li>
      <li><a class="btn" href="?method=logout">Cerrar sesión</a></li>
    </ul>
  </header>

  <div class="container">
    <div class="container-main">
      <section class="section__head">
        <h2>Bienvenido <span><?php echo htmlspecialchars($_SESSION['email']); ?></span> &#128075;</h2>
        <ul>
          <li><a class="btn" href="?method=addProductPage">Agregar producto</a></li>
          <li><a class="btn" href="?method=searchPage">Buscar producto</a></li>
          <li><a class="btn" href="?method=totalValue">Valor de productos</a></li>
        </ul>
      </section>

      <section class="section-cards">
        <?php
        // Recuperamos los productos de la cookie
        $products = isset($_COOKIE['products']) ? json_decode($_COOKIE['products'], true) : [];
        $totalProducts = count($products);
        $totalValue = 0;
        $averagePrice = $totalProducts > 0 ? array_sum(array_column($products, 'pricing')) / $totalProducts : 0;

        foreach ($products as $product) {
          $totalValue += $product['pricing'] * $product['stock'];
        }
        ?>
        <div class="card">
          <div class="card__img">
            <img src="./assets/shopCar.svg" alt="shopCar" />
          </div>
          <div class="card__info">
            <h3><?php echo $totalProducts; ?> UDS</h3>
            <p>Número de productos</p>
          </div>
        </div>
        <div class="card">
          <div class="card__img">
            <img src="./assets/pricing.svg" alt="pricing" />
          </div>
          <div class="card__info">
            <h3><?php echo number_format($averagePrice, 2); ?> $</h3>
            <p>Precio medio de los productos</p>
          </div>
        </div>
        <div class="card">
          <div class="card__img">
            <img src="./assets/euro.svg" alt="totalValue" />
          </div>
          <div class="card__info">
            <h3><?php echo number_format($totalValue, 2); ?> $</h3>
            <p>Valor total</p>
          </div>
        </div>
      </section>


      <main class="main-table">
        <table class="table-desktop">
          <thead class="table-desktop__head">
            <tr>
              <th>Producto</th>
              <th>Stock</th>
              <th>Precio/Unidad</th>
              <th>Añadido por</th>
              <th>Valor Total</th> <!-- Nueva columna para el valor total -->
            </tr>
          </thead>
          <tbody class="table-desktop__body">
            <?php
            foreach ($products as $product) {
              $valorTotal = $product['stock'] * $product['pricing']; // Cálculo del valor total
              echo "<tr>
                        <td>" . htmlspecialchars($product['name']) . "</td>
                        <td>" . htmlspecialchars($product['stock']) . "</td>
                        <td>" . htmlspecialchars($product['pricing']) . "</td>
                        <td>" . htmlspecialchars($product['added_by']) . "</td>
                        <td>$" . number_format($valorTotal, 2) . "</td> <!-- Mostrar el valor total formateado -->
                      </tr>";
            }
            ?>
          </tbody>
        </table>

        <aside>
          <ul>
            <li>Todos los miembros registrados:</li>
            <?php
            // Recuperar todos los usuarios registrados de la cookie
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