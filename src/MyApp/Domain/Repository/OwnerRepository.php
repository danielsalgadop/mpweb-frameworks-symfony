<?php

namespace MyApp\Domain\Repository;


interface OwnerRepository
{

    public function findAllOrderedByName();

}