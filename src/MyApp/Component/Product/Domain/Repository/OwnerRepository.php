<?php

namespace MyApp\Component\Product\Domain\Repository;


interface OwnerRepository
{

    public function findById($ownerId);

    public function findAllOrderedByName();

}