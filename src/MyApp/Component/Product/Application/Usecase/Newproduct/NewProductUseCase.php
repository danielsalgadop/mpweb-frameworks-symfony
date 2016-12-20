<?php

namespace MyApp\Component\Product\Application\UseCase\Newproduct;

use Doctrine\ORM\EntityManager;
use MyApp\Component\Product\Application\Service\EmailService;
use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class NewProductUseCase
{

    private $ownerRepository;

    private $entityManager;

    private $emailService;

    public function __construct(OwnerRepository $ownerRepository, EntityManager $entityManager, EmailService $emailService)
    {
        $this->ownerRepository = $ownerRepository;
        $this->entityManager = $entityManager;
        $this->emailService = $emailService;
    }

    public function execute(string $productName, float $productPrice, string $productDescription, int $productOwnerId)
    {

        $owner = $this->ownerRepository->findById($productOwnerId);

        $product = new Product($productName, $productPrice, $productDescription, $owner);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->emailService->sendEmailTo($owner->getName(), "a random content");

    }


}