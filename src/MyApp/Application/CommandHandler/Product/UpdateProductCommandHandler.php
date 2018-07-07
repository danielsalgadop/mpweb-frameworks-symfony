<?php

namespace MyApp\Application\CommandHandler\Product;
use MyApp\Domain\Product;
use MyApp\Domain\Repository\ProductRepository;
use MyApp\Domain\Repository\OwnerRepository;


class UpdateProductCommandHandler
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle($command, $id)
    {
        $product = $this->productRepository->findProductByIdOrError($id);

        $product->setName($command->getName());
        $product->setPrice($command->getPrice());
        $product->setDescription($command->getDescription());
        $this->productRepository->persist($product);
        return true;
    }
}
