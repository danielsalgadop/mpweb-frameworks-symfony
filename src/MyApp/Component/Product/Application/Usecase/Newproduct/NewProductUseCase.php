<?php

namespace MyApp\Component\Product\Application\UseCase\Newproduct;

use Doctrine\ORM\EntityManager;
use MyApp\Component\Product\Application\Service\EmailService;
use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class NewProductUseCase
{

    private $ownerRepository;

    private $entityManager;

    private $dispatcher;

    public function __construct(OwnerRepository $ownerRepository, EntityManager $entityManager, EventDispatcherInterface $dispatcher)
    {
        $this->ownerRepository = $ownerRepository;
        $this->entityManager = $entityManager;
        $this->dispatcher = $dispatcher;
    }

    public function execute(string $productName, float $productPrice, string $productDescription, int $productOwnerId)
    {

        $owner = $this->ownerRepository->findById($productOwnerId);

        $product = new Product($productName, $productPrice, $productDescription, $owner);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->dispatcher->dispatch(ProductCreated::TOPIC, new ProductCreated($product));

    }


}