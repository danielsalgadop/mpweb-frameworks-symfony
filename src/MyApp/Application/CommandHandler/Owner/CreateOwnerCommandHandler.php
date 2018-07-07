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

        return true;
        // DUDA Pablo, I was trying to return Id of recent created owner. While ->geName() works, getId() does not.
        // return $owner->getId();  //
        // return $owner->getName();
    }
}
