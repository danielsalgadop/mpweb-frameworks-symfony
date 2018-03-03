<?php

namespace MyApp\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Owner
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    private $products;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    public function __construct(string $name, float $price, string $description)
    {
        $this->name = $name;
        $this->products = new ArrayCollection();
        /*
        $this->price = $price;
        $this->description = $description; */
    }
    /**
     * One Owner has many Products
     * @OneToMany(targetEntity="Product", mappedBy="product")
     */

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
}