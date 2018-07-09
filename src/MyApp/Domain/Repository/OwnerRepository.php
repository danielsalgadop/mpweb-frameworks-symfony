<?php

namespace MyApp\Domain\Repository;

use MyApp\Domain\Owner;

interface OwnerRepository
{
    public function findAllOrderedByName();
    public function persist(Owner $owner);
}
