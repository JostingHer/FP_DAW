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
     if(isset($_COOKIE["listaDeseos"])){
        $lista = unserialize($_COOKIE["listaDeseos"]);

    foreach ($lista as $deseo){
        echo "<li>".$deseo."</li>";
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