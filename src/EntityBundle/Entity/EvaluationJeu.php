<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationJeu
 *
 * @ORM\Table(name="evaluation_jeu", indexes={@ORM\Index(name="email_client", columns={"user", "jeu"}), @ORM\Index(name="nom_jeu", columns={"jeu"}), @ORM\Index(name="email_client_2", columns={"user"}), @ORM\Index(name="nom_jeu_2", columns={"jeu"})})
 * @ORM\Entity
 */
class EvaluationJeu
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var \JeuxVideo
     *
     * @ORM\ManyToOne(targetEntity="JeuxVideo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jeu", referencedColumnName="id")
     * })
     */
    private $jeu;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;


}

