<?php

require_once "exceptionCustom.php";

class App
{
    public function calculadora($operando1, $operando2, $operacion)
    {
        if (!empty($operando1) && !empty($operando2)) {
            switch ($operacion) {
                case "+":
                    return $operando1 + $operando2;
                case "-":
                    return $operando1 - $operando2;
                case "x":
                    return $operando1 * $operando2;
                case "/":
                    try {
                        if ($operando2 == 0) {
                            throw new ZeroException("No se puede dividir por 0");
                        }
                        return $operando1 / $operando2;
                    } catch (ZeroException $e) {
                        return $e->errorMessage();
                    }
                default:
                    return "Operación no válida";
            }
        } else {
            return "Faltan operandos";
        }
    }
}
