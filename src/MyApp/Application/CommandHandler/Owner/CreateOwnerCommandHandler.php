<?php

namespace MyApp\Application\CommandHandler\Owner;
use MyApp\Domain\Owner;



class CreateOwnerCommandHandler
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle($command)
    {


        $owner = new Owner($command->getName());
        $this->entityManager->persist($owner);
        $this->entityManager->flush();


        return true;
        return $owner->getId();
    }
}
