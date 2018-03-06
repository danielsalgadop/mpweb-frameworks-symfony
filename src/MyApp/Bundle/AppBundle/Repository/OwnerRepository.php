<?php

// src/AppBundle/Repository/ProductRepository.php
namespace MyApp\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OwnerRepository extends EntityRepository
{
    public function findByAllOrderedByName()
    {
        /* Siendo un EntityRepository tienes accesible en $this el EntityManager */
        return $this->getEntityManager()
            ->createQuery(
                'SELECT o FROM AppBundle:Owner o ORDER BY o.name ASC'
            )
            ->getResult();
    }
}