<?php

namespace MyApp\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * Many User Have Many Products * OJO se llam ManyToMany, pero con el unique se restringe a oneToMany
     * @ManytoMany(targetEntity="Product")
     * @JoinTable(name="owners_products",
     *  joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *  inverseJoinColumns={@JoinColumn(name="user_id", referencedColumnName="id", unique=true}
     */
    private $products;


    /**
     * One Owner have Many Products
     * @OneToMany(targetEntity="Product", mappedBy="product")
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->products = new new \Doctrine\Common\Collections\ArrayCollection();
        /*
        $this->price = $price;
        $this->description = $description;
        */
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
}