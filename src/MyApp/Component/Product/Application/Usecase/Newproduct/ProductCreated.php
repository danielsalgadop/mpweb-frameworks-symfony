<?php

namespace MyApp\Component\Product\Application\UseCase\Newproduct;

use MyApp\Component\Product\Domain\Product;
use Symfony\Component\EventDispatcher\Event;

class ProductCreated extends Event
{

    const TOPIC = "product.created";

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

}