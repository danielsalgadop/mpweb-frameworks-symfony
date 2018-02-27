<?php

namespace MyApp\Bundle\AppBundle\Entity\UnaEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstoQueEs
 *
 * @ORM\Table(name="una_entity_esto_que_es")
 * @ORM\Entity(repositoryClass="MyApp\Bundle\AppBundle\Repository\UnaEntity\EstoQueEsRepository")
 */
class EstoQueEs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var int
     *
     * @ORM\Column(name="altura", type="integer", nullable=true)
     */
    private $altura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nac", type="date")
     */
    private $fechaNac;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EstoQueEs
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return EstoQueEs
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set altura
     *
     * @param integer $altura
     *
     * @return EstoQueEs
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get altura
     *
     * @return int
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set fechaNac
     *
     * @param \DateTime $fechaNac
     *
     * @return EstoQueEs
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    /**
     * Get fechaNac
     *
     * @return \DateTime
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }
}

