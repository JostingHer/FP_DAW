<?php

class User
{
    public $email;
    public $password;

    public function __construct($email, $password)
    {

        $this->email = $email;
        $this->password = $password;
    }


    // retornmar cada atributos hacer los getters

    public function getEmail()
    {
        return $this->email;
    }


    // Método para convertir el objeto User en un array
    public function toArray()
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
