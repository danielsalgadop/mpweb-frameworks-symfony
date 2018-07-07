<?php

namespace MyApp\Application\CommandHandler\Owner;

use MyApp\Domain\Repository\OwnerRepository;


class ListOwnersCommandHandler
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function handle($command)
    {
        $arr_owners = $this->ownerRepository->findAllOrderedByName();
    }
}
