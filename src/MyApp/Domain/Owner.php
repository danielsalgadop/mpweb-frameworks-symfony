<?php

namespace MyApp\Domain;

use MyApp\Domain\Exception\Owner\InvalidOwnerNameException;

class Owner
{
    private $id;
    private $name;

    public function __construct(string $name)
    {
        $name = $this->cleanName($name);
        $this->isValidNameOrError($name);
        $this->name = $name;
    }

    // TODO reuse this behaviour  move to general Validator
    public function isValidNameOrError($name): bool
    {
        if ($name == "") {
            throw new InvalidOwnerNameException('empty Owner Name');
        }
        return true;
    }

    // TODO reuse this behaviour  (\s* ) move to general Validator
    private function cleanName($name): string
    {
        $name = filter_var(trim($name), FILTER_SANITIZE_STRING);
        return preg_replace("/\s+/", ' ', $name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    // TODO - borrable?
    public function setName($name)
    {
        $this->name = $name;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }
}
