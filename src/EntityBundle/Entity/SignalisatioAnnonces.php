<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SignalisatioAnnonces
 *
 * @ORM\Table(name="signalisatio_annonces", indexes={@ORM\Index(name="fk_Signalisatio_User", columns={"UserSignale"})})
 * @ORM\Entity
 */
class SignalisatioAnnonces
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSignalisation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsignalisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="idAnnonce", type="integer", nullable=false)
     */
    private $idannonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrSignalisation", type="integer", nullable=false)
     */
    private $nbrsignalisation;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserSignale", referencedColumnName="id")
     * })
     */
    private $usersignale;


}

