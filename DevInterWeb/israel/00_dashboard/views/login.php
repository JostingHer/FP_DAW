<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login y Registro Sparking</title>
  <link rel="stylesheet" href="./styles/normalize.css" />
  <link rel="stylesheet" href="./styles/form.css" />

  <style>
    .error {
      color: red;
      font-weight: bold;
      display: block;
    }
  </style>
</head>

<body>
  <div class="container-login">

    <form action="?method=redirigirCaptcha" method="post">
      <div class="g-recaptcha" data-sitekey="<?php echo $this->siteKey; ?>"></div>
      <script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=<?php echo $this->$lang; ?>">
      </script>
      <br />
      <input type="submit" value="submit" />
    </form>


  </div>


</body>

</html>