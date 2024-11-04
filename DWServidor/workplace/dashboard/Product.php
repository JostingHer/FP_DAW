<?php
class Product
{
    public $name;
    public $stock;
    public $pricing;
    public $added_by;

    public function __construct($name, $stock, $pricing, $added_by)
    {
        $this->name = $name;
        $this->stock = $stock;
        $this->pricing = $pricing;
        $this->added_by = $added_by;
    }

    public function __toString()
    {
        return "Producto: $this->name, Stock: $this->stock, Precio: $this->pricing, Added by: $this->added_by";
    }

    // Getters
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

    public function getAddedBy()
    {
        return $this->added_by;
    }
}
