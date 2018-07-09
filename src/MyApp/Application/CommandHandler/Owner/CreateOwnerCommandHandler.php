<?php

namespace MyApp\Application\CommandHandler\Owner;

use MyApp\Domain\Owner;
use MyApp\Domain\Repository\OwnerRepository;

class CreateOwnerCommandHandler
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function handle($command)
    {
        $owner = new Owner($command->getName());
        $this->ownerRepository->persist($owner);
        return true;
    }
}
