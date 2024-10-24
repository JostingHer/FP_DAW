<?php

class Product
{
    public $name;
    public $stock;
    public $pricing;
    public $user;

    public function __construct($name, $stock, $pricing, $user)
    {

        $this->name = $name;
        $this->stock = $stock;
        $this->pricing = $pricing;
        $this->user = $user;
    }


    public function __toString()
    {

        return "Producto: $this->name, Stock: $this->stock, Precio: $this->pricing, Usuario: $this->user";
    }
    // retornmar cada atributos hacer los getters

    public function getName()
    {
        return $this->name;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getPricing()
    {
        return $this->pricing;
    }
}
