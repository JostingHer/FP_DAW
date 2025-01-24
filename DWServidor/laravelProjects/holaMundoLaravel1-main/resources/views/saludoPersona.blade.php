<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo</title>
</head>
<body>


    @if($varRol == null) <p>Hola {{$varPersona}}.</p>

    @else <p>Hola {{$varPersona}} de rol {{$varRol}}.</p>

    @endif
    
    <?php
    /*
        if($varRol == null){
            echo "Hola " . $varPersona;
        }else{
            echo "Hola " . $varPersona . " de rol " . $varRol;
        }
        */
    ?>
    
</body>
</html>