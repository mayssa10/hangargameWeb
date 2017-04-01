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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getNomJeu()
    {
        return $this->nomJeu;
    }

    /**
     * @param string $nomJeu
     */
    public function setNomJeu($nomJeu)
    {
        $this->nomJeu = $nomJeu;
    }

    /**
     * @return int
     */
    public function getNbrMax()
    {
        return $this->nbrMax;
    }

    /**
     * @param int $nbrMax
     */
    public function setNbrMax($nbrMax)
    {
        $this->nbrMax = $nbrMax;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return \Gamer
     */
    public function getIdGamer()
    {
        return $this->idGamer;
    }

    /**
     * @param \Gamer $idGamer
     */
    public function setIdGamer($idGamer)
    {
        $this->idGamer = $idGamer;
    }


}

