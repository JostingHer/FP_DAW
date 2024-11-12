<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agregar Producto - Mercado Sparking</title>
  <link rel="stylesheet" href="./styles/normalize.css" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/form.css" />


  <style>
    .main__login {
      margin: 0 auto;
      display: flex;
      justify-content: center;
      height: 100vw;
    }
  </style>
</head>


<body>
  <header class="header">
    <h1 class="header__title"><a href="?method=home">Mercado Sparking</a></h1>
    <ul class="header__nav">
      <li><a class="btn" href="?method=home">Inicio</a></li>
      <li><a class="btn" href="?method=logout">Cerrar sesión</a></li>
    </ul>
  </header>
  <div class="container">
    <div class="container-main">
      <section class="section__head">
        <h2><span><?php echo htmlspecialchars($_SESSION['email']); ?></span> &#128075;</h2>
        <ul>
          <li><a class="btn" href="?method=addProductPage">Agregar producto</a></li>
          <li><a class="btn" href="?method=searchPage">Buscar producto</a></li>
          <li><a class="btn" href="?method=totalValue">Valor de productos</a></li>
        </ul>
      </section>

      <section class="section-cards">
        <?php
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
            <h3><?php echo $totalProducts; ?> </h3>
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

      <main>

        <div class="login__container-form login__container-form-product">
          <form action="?method=addProduct" method="post" class="form">
            <legend class="login__title">Agregar Producto</legend>

            <div class="form__field">
              <label for="name">Nombre del producto:</label>
              <input type="text" id="name" name="name" required />
            </div>

            <div class="form__field">
              <label for="stock">Cantidad:</label>
              <input type="number" min="1" name="stock" id="stock" required />
            </div>

            <div class="form__field">
              <label for="pricing">Precio:</label>
              <input type="number" min="0" step="0.01" name="pricing" id="pricing" required />
            </div>

            <input class="form__submit" type="submit" value="Agregar producto" />
          </form>


        </div>

      </main>
    </div>
  </div>
</body>

</html>