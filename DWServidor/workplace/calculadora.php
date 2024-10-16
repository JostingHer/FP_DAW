<!--
Envío del script al mismo script. Crea un formulario que funcione como calculadora. Debe contener dos input como operandos y un select para elegir operador. 

    Si se reciben los datos muestra el resultado. 

    Si no son válidos o no existen debe devolver a la página anterior.

-->
<html>

<head>
    <title>Ejercicio de calculadora</title>
</head>

<body>
    <form action="" method="get">
        <label for="operando1">Operando:</label><br>
        <!-- El siguiente fragmento PHP sirve para que el operando que escribe el usuario se mantenga escrito al pulsar 'Enviar' -->
        <?php
        if (isset($_GET['operando1'])) {
            $numero = $_GET['operando1'];
            echo '<input type="text" name="operando1" value=""' . $numero . '"><br>';
        } else {
            echo '<input type="text" name="operando1" value=""><br>';
        }
        ?>
        <!-- El segundo operando, sin fragmento PHP, hace que el operando  no se mantenga escrito al pulsar 'Enviar'-->
        <label for="operando2">Operando:</label><br>
        <input type="text" name="operando2" value=""><br>

        <label for="operacion">Operación:</label><br>
        <select name=" operacion">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="x">Multiplicación</option>
            <option value="/">División</option>
        </select>


        <input type="submit" value="Enviar"><br>
    </form>
    <p>


        <?php

        if (isset($_GET['operando1']) && isset($_GET['operando2']) && isset($_GET['operacion'])) {


            if ($_GET['operando1'] != "" && $_GET['operando2'] != "") {
                //Mostrar resultado, en este caso en la propia página
                switch ($_GET['operacion']) {
                    case "+":
                        echo $_GET["operando1"] + $_GET["operando2"];
                        break;
                    case "-":
                        echo $_GET['operando1'] - $_GET['operando2'];
                        break;
                    case "x":
                        echo $_GET['operando1'] * $_GET['operando2'];
                        break;
                    case "/":
                        echo $_GET['operando1'] / $_GET['operando2'];
                        break;
                    default:
                        echo "Default";
                        break;
                }
            } else {
                echo "Faltan operandos";
            }
        }
        ?>
    </p>

</body>

</html>