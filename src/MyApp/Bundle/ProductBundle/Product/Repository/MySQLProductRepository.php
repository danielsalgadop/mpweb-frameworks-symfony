<?php

namespace MyApp\Bundle\ProductBundle\Product\Repository;

use Doctrine\ORM\EntityRepository;
use MyApp\Domain\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use MyApp\Domain\Product;

class MySQLProductRepository implements ProductRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAllOrderedByName()
    {
        return $this->entityManager
            ->createQuery(
                'SELECT p FROM \MyApp\Domain\Product p ORDER BY p.id ASC'
            )
            ->getResult();
    }

    public function persist(Product $product)
    {
        $this->entityManager->persist($product);
    }
}