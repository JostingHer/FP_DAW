<!--
Envío del script al mismo script. Crea un formulario que funcione como calculadora. Debe contener dos input como operandos y un select para elegir operador. 

    Si se reciben los datos muestra el resultado. 

    Si no son válidos o no existen debe devolver a la página anterior.

-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio de Calculadora</title>
</head>

<body>
    <?php require("header.php"); ?>

    <form action="?method=calculadora" method="post">
        <label for="operando1">Operando 1:</label><br>
        <input type="text" name="operando1" value="<?php echo isset($_POST['operando1']) ? htmlspecialchars($_POST['operando1']) : ''; ?>"><br>

        <label for="operando2">Operando 2:</label><br>
        <input type="text" name="operando2" value="<?php echo isset($_POST['operando2']) ? htmlspecialchars($_POST['operando2']) : ''; ?>"><br>

        <label for="operacion">Operación:</label><br>
        <select name="operacion">
            <option value="+" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == '+' ? 'selected' : ''; ?>>Suma</option>
            <option value="-" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == '-' ? 'selected' : ''; ?>>Resta</option>
            <option value="x" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == 'x' ? 'selected' : ''; ?>>Multiplicación</option>
            <option value="/" <?php echo isset($_POST['operacion']) && $_POST['operacion'] == '/' ? 'selected' : ''; ?>>División</option>
        </select><br>

        <input type="submit" value="Enviar"><br>
    </form>

    <?php
    if (isset($_POST['operando1'], $_POST['operando2'], $_POST['operacion'])) {
        require_once("calculadora.php");
        $app = new App();
        $resultado = $app->calculadora($_POST['operando1'], $_POST['operando2'], $_POST['operacion']);
        echo "<h2>Resultado: $resultado</h2>";
    }
    ?>
</body>

</html>