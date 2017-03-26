<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="gamer")
 */
class Gamer extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=150, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=true)
     */
    private $tel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="datetime", nullable=true)
     */
    private $dateinscription;

    /**
     * @var string
     *
     * @ORM\Column(name="codeValidation", type="string", length=11, nullable=true)
     */
    private $codevalidation;

    /**
     * @var integer
     *
     * @ORM\Column(name="validation", type="integer", nullable=true)
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return \DateTime
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * @param \DateTime $dateinscription
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;
    }

    /**
     * @return string
     */
    public function getCodevalidation()
    {
        return $this->codevalidation;
    }

    /**
     * @param string $codevalidation
     */
    public function setCodevalidation($codevalidation)
    {
        $this->codevalidation = $codevalidation;
    }

    /**
     * @return int
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @param int $validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getParent(){
        return 'FOSUserBundle';
    }

}

