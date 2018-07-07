<?php

namespace MyApp\Bundle\ProductBundle\Product\Repository;

use Doctrine\ORM\EntityRepository;
use MyApp\Domain\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use MyApp\Domain\Product;
use \Exception;

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

    public function findProductByIdOrError(int $product_id):Product
    {
        $product = $this->entityManager
            ->getRepository('MyApp\Domain\Product')
            ->findOneBy(['id' => $product_id]);
        if ( $product === null) {
            // TODO - move this to Domain and semantic Exception
            throw new Exception("Unknown ProdcutID [".$product_id."]");
        }
        return $product;
    }

    public function remove(int $product_id)
    {
        // $em = $this->getDoctrine()->getManager();
        $product = $this->entityManager->getReference('\MyApp\Domain\Product', $product_id);
        $this->entityManager->remove($product);

        // $this->entityManager->delete($product_id);
    }

    public function persist(Product $product)
    {
        $this->entityManager->persist($product);
    }
}