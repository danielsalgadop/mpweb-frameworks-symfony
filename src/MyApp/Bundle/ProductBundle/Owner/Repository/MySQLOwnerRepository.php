<?php

namespace MyApp\Bundle\ProductBundle\Owner\Repository;

use Doctrine\ORM\EntityRepository;
use MyApp\Domain\Repository\OwnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use MyApp\Domain\Owner;
use \Exception;

class MySQLOwnerRepository implements OwnerRepository
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
                'SELECT o FROM \MyApp\Domain\Owner o ORDER BY o.name ASC'
            )
            ->getResult();
    }

    public function findOwnerByIdOrError(int $ownerId):Owner
    {
        $owners = $this->entityManager
            ->getRepository('MyApp\Domain\Owner')
            ->findBy(['id' => $ownerId]);
        if (count($owners) === 0) {
            // TODO - move this to Domain and semantic Exception
            throw new Exception("Unknown OwnerId [".$ownerId."]");
        }
        return $owners[0];
    }

    public function persist(Owner $owner)
    {
        $this->entityManager->persist($owner);
    }
}