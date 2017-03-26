<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonces
 *
 * @ORM\Table(name="annonces", indexes={@ORM\Index(name="User", columns={"User"})})
 * @ORM\Entity
 */
class Annonces
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAnnonces", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idannonces;

    /**
     * @var string
     *
     * @ORM\Column(name="nomAnnonces", type="string", length=30, nullable=false)
     */
    private $nomannonces;

    /**
     * @var string
     *
     * @ORM\Column(name="typeAnnonces", type="string", length=10, nullable=false)
     */
    private $typeannonces;

    /**
     * @var string
     *
     * @ORM\Column(name="consoleAnnonces", type="string", length=10, nullable=false)
     */
    private $consoleannonces;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixAnnonces", type="integer", nullable=false)
     */
    private $prixannonces;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionAnnonces", type="text", length=65535, nullable=false)
     */
    private $descriptionannonces;

    /**
     * @var string
     *
     * @ORM\Column(name="imageAnnonces", type="blob", nullable=false)
     */
    private $imageannonces;

    /**
     * @var string
     *
     * @ORM\Column(name="pathImage", type="text", length=65535, nullable=false)
     */
    private $pathimage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime", nullable=false)
     */
    private $dateajout;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="User", referencedColumnName="id")
     * })
     */
    private $user;


}

