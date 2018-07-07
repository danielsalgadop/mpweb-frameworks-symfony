<?php

namespace MyApp\Application\Command\Product;

class UpdateProductCommand
{
    private $name;
    private $price;
    private $description;

    public function __construct(string $name, int $price, string $description) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }
}