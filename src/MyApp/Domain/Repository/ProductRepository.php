<?php

namespace MyApp\Domain\Repository;

use MyApp\Domain\Product;

interface ProductRepository
{
    public function findAllOrderedByName();
    public function persist(Product $product);

}