<?php

namespace MyApp\Application\CommandHandler\Product;

use MyApp\Domain\Repository\ProductRepository;

class ListProductsCommandHandler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle()
    {
        return $this->productRepository->findAllOrderedByName();
    }
}
