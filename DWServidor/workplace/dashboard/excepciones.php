<?php
class InvalidEmailException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = "<p class='error'>El correo no es válido</p>";
        return $errorMsg;
    }
}

class InvalidPasswordException extends Exception
{
    private $customMessage;

    public function __construct($message = "La contraseña es invalida")
    {
        $this->customMessage = $message;
    }

    public function errorMessage()
    {
        return "<p class='error'>{$this->customMessage}</p>";
    }
}
class UnatherizedAccessException extends Exception
{
    public function errorMessage()
    {
        //error message
        $errorMsg = "<p class='error'>ESTA SERIA COMO UNA PAGINA 404, NO ESTAS AUTORIZADO O HAS LLEGADO POR ACCIDENTE Y LA RUTA NO EXISTE</p>";
        return $errorMsg;
    }
}
