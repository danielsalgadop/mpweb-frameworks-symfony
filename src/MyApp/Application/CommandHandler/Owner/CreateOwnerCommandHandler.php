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
        // file_put_contents("/home/dsalgado/mylogs/filelogs.log",var_export($persisted_owner,true),FILE_APPEND);

        return true;
        // DUDA Pablo, I was trying to return Id of recent created owner. While ->geName() works, getId() does not.
        // return $owner->getId();  //
        // return $owner->getName();
    }
}
