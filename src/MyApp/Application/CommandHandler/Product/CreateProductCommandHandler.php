<?php

namespace MyApp\Application\CommandHandler\Product;

use MyApp\Domain\Product;
use MyApp\Domain\Repository\ProductRepository;
use MyApp\Domain\Repository\OwnerRepository;

class CreateProductCommandHandler
{
    private $productRepository;
    private $ownerRepository;

    public function __construct(ProductRepository $productRepository, OwnerRepository $ownerRepository)
    {
        $this->productRepository = $productRepository;
        $this->ownerRepository = $ownerRepository;
    }

    public function handle($command)
    {
        $owner = $this->ownerRepository->findOwnerByIdOrError($command->getOwnerId());

        $product = new Product($command->getName(), $command->getPrice(), $command->getDescription(), $owner);
        $this->productRepository->persist($product);
        return true;
    }
}
