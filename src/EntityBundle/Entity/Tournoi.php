<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi", indexes={@ORM\Index(name="id_gamer_tournoi", columns={"id_gamer"}), @ORM\Index(name="id_gamer_tournoi_2", columns={"id_gamer"}), @ORM\Index(name="id_gamer", columns={"id_gamer"}), @ORM\Index(name="id_gamer_2", columns={"id_gamer"}), @ORM\Index(name="id_gamer_3", columns={"id_gamer"}), @ORM\Index(name="id_gamer_4", columns={"id_gamer"})})
 * @ORM\Entity
 */
class Tournoi
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_jeu", type="string", length=20, nullable=false)
     */
    private $nomJeu;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_max", type="integer", nullable=false)
     */
    private $nbrMax;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_gamer", referencedColumnName="id")
     * })
     */
    private $idGamer;


}

