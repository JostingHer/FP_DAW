<html>

<head>
    <title>Título</title>

    <style>
        .link__delete {
            color: red;
            text-decoration: none;
            margin-left: 10px;
        }

        .flex {
            display: flex;
        }
    </style>
</head>

<body>

    <h1>Home</h1>
    <div>
        ¡Muy buenas! Estamos en el home del usuario


        <!-- veindolo de mas arriab ahora, en el caso de moificar uno
                tengo que hacer un get saber cual quiero modificar
                setear el input que no se como es dimielo


                y luego un post para modificarlo 
        -->


        <!-- setear el input text-->

        <!-- <form action="?method=edit" method="get">
            <label for="">Lista de deseos</label>
            <input type="text" name="deseos">
            <input type="submit">


        </form>
 -->


        <!-- formulario con  un input y un botón para agregar lista de deseos usar los metodos de app-->

        <form action="?method=new" method="post">
            <label for="">Lista de deseos</label>
            <input type="text" name="deseos">
            <input type="submit">
        </form>

        <!-- visualizar la lista de deses en una ul li -->

        <ul>
            <?php
            $deseos = json_decode($_COOKIE['deseos'], true);
            foreach ($deseos as $index => $deseo) {

                echo "<div class='flex'>";
                echo "<li>$index - $deseo</li>";
                echo "<a class='link__delete' href='?method=delete&index=$index'>X</a>";


                echo "<a class='link__delete' href='?method=edit&index=$index'>editar</a>";




                echo "</div>";
            }
            ?>
        </ul>

        <a href="?method=empty">Borrar lista de deseos</a>






    </div>
    <a href="?method=logout">Cerrar sesión</a>

    <br>


</body>

</html>