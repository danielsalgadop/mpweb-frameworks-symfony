<?php

namespace MyApp\Domain;

// use Doctrine\ORM\Mapping as ORM;
use \Exception;
use  MyApp\Domain\Owner;

class Product
{
    private $id;

    private $name;

    private $price;

    private $description;

    private $owner;

    public function __construct(string $name, float $price, string $description, Owner $owner)
    {
        // Sanitize

        $name = $this->cleanName($name);
        $price = $this->cleanPrice($price);
        $description = $this->cleanDescription($description);

        // Validate
        $this->isValidNameOrError($name);
        $this->isValidPriceOrError($price); // struggled more than desired with this!
        $this->isValidDescriptionOrError($description);

        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->owner = $owner;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    // TODO reuse this behaviour move to general Validator
    public function isValidNameOrError($name): bool
    {
        if ($name == "") {
            throw new Exception('Invalid Product Name');
        }
        return true;
    }
    // TODO reuse this behaviour move to general Validator
    public function isValidPriceOrError(float $price): bool
    {
        if (!is_float($price) || $price == 0) {
            throw new Exception('Invalid Product Price, cant be 0');
        }
        return true;
    }
    // TODO reuse this behaviour move to general Validator
    public function isValidDescriptionOrError($description): bool
    {
        if ($description == "") {
            throw new Exception('Invalid Product Description');
        }
        return true;
    }

    // TODO reuse this behaviour  (\s* ) move to general Validator
    private function cleanName($name): string
    {
        $name = filter_var(trim($name), FILTER_SANITIZE_STRING);
        return preg_replace("/\s+/", ' ', $name);
    }
    // TODO reuse this behaviour  (\s* ) move to general Validator
    private function cleanPrice(float $price): float
    {
        $price = preg_replace("/\s+/", ' ', $price);
        $price = filter_var(trim($price), FILTER_SANITIZE_NUMBER_FLOAT);
        return $price;
    }
    // TODO reuse this behaviour  (\s* ) move to general Validator
    private function cleanDescription($description): string
    {
        $description = filter_var(trim($description), FILTER_SANITIZE_STRING);
        return preg_replace("/\s+/", ' ', $description);
    }
}
