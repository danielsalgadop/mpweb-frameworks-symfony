<?php

namespace MyApp\Domain;
use MyApp\Domain\Exception\Owner\InvalidOwnerNameException;

class Owner
{

    private $id;

    private $name;

    /**
     * Owner constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $name = $this->cleanName($name);
        $this->isValidName(filter_var($name, FILTER_SANITIZE_STRING));
        $this->name = $name;
    }

    public function isValidName($name): bool
    {
        if ($name == ""){
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
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
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