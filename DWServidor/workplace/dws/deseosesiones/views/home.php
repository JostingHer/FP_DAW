<html>

<head>
   
</head>

<body>
    <h1>Estas en tu home</h1>


    <form action="?method=new" method="post">
        <label for="">Nuevo deseo</label>
        <input type="text" name="deseo"> <br>
        <input type="submit">
    </form>


    <ol>
    <?php
        // Verificar si la lista de deseos está en la sesión
        if (isset($_SESSION['listaDeseos'])) {
            $lista = $_SESSION['listaDeseos'];

            foreach ($lista as $deseo) {
                echo "<li>" . htmlspecialchars($deseo) . "</li>"; // Usar htmlspecialchars para evitar XSS
            }
        }
        ?>
    </ol>


    <form action="?method=delete" method="post">
        <label for="">Borrar deseo</label>
        <input type="text" name="numeroDeseo"> <br>
        <input type="submit">
    </form>

    <a href="?method=close">Borrar lista</a>

</body>

</html>