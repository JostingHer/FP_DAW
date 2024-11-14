<html>

<body>

    <form action="" method="get">
        <label for="fname"></label><br>
        <input type="text" name="elemento">
        <input type="hidden" name="elementos[]">
        <input type="submit" value="Enviar">

        <?php
        $elementos = [];
        if (isset($_GET['elemento']) && ($_GET['elemento']) != "") {
            $elementos = $_GET["elemento"];
            foreach ($elementos as $elemento) {
                $elementos[] = $_GET['elemento'];
            }
        }
        ?>


        <ul>
            <li><?php echo $elementos ?></li>
            <li><?php echo $elementos ?></li>
            <li><?php echo $elementos ?></li>
        </ul>

    </form>


</body>

</html>