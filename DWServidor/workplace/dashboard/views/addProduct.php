<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agregar Producto - Mercado Sparking</title>
  <link rel="stylesheet" href="./styles/normalize.css" />
  <link rel="stylesheet" href="./styles/form.css" />
</head>

<body>
  <div class="container-login">
    <main class="main">
      <div class="main__login">
        <img class="login__img" src="./assets/logo.webp" alt="Logo Mercado Sparking" />
        <div class="login__container-form">
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

          <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
              <?php
              if ($_GET['error'] == 3) {
                echo "Por favor, completa todos los campos correctamente.";
              }
              ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </main>
  </div>
</body>

</html>