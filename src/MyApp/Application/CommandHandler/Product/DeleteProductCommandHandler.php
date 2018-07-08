<?php

namespace MyApp\Application\CommandHandler\Product;
use MyApp\Domain\Repository\ProductRepository;


class DeleteProductCommandHandler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle($id)
    {
        $product = $this->productRepository->remove($id);

        // $product = $produt->getReference('\MyApp\Domain\Product', $id);

        // $em->remove($product);

        return true;
    }
}
