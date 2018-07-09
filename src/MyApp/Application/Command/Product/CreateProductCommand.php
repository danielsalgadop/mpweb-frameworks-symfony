<?php

namespace MyApp\Application\Command\Product;

class CreateProductCommand
{
    private $name;
    private $price;
    private $description;
    private $ownerId;

    public function __construct(string $name, int $price, string $description, int $ownerId)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->ownerId = $ownerId;
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

    public function getOwnerId()
    {
        return $this->ownerId;
    }
}
