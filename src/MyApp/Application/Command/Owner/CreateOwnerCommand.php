<?php

namespace MyApp\Application\Command\Owner;

class CreateOwnerCommand
{
    private $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
