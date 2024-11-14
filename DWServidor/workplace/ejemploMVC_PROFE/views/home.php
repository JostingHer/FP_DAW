<html>


<head>
    <title>Consultas</title>
    <style>
        .column {
            float: left;
            width: 50%;

        }
    </style>
</head>

<body>


    <h1>Consultas de librería</h1>
    <h2>
        Seleccione la consulta a realizar
    </h2>
    <br>

    <div class="row">

        <div class="column">

            <form action="obtenerEscritores" method="post">
                <label for="">Consultar todos los escritores por nombre ascendente: </label><br>
                <input type="submit" value="Consultar">
            </form>


        </div>
        <div class="column">
            <h2>
                Resultado:
            </h2>
            <ul>
                <?php
                foreach ($escritores as $escritor) {
                    
                    echo "<li>" . $escritor->getNombre() . "</li>";
                }

                ?>


            </ul>

        </div>
    </div>

</body>

</html>