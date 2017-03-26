<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavorisAnnonce
 *
 * @ORM\Table(name="favoris_annonce", indexes={@ORM\Index(name="idAnnonce", columns={"idAnnonce"}), @ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 */
class FavorisAnnonce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Annonces
     *
     * @ORM\ManyToOne(targetEntity="Annonces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAnnonce", referencedColumnName="idAnnonces")
     * })
     */
    private $idannonce;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;


}

