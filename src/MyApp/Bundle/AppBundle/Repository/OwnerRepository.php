<?php

namespace MyApp\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class OwnerRepository extends EntityRepository
{

    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT o FROM \MyApp\Bundle\AppBundle\Entity\Owner o ORDER BY o.name ASC'
            )
            ->getResult();
    }

}