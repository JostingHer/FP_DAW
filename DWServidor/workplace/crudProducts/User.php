<?php

class User
{
    public $name;
    public $password;

    public function __construct($name, $password)
    {

        $this->name = $name;
        $this->password = $password;
    }


    // retornmar cada atributos hacer los getters

    public function getName()
    {
        return $this->name;
    }
}
