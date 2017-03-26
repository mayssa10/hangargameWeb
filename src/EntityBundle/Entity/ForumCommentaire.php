<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumCommentaire
 *
 * @ORM\Table(name="forum_commentaire", indexes={@ORM\Index(name="sujet", columns={"sujet"}), @ORM\Index(name="fk_Commentaire_User", columns={"auteur"})})
 * @ORM\Entity
 */
class ForumCommentaire
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
     * @ORM\Column(name="contenue", type="text", length=65535, nullable=false)
     */
    private $contenue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \ForumSujet
     *
     * @ORM\ManyToOne(targetEntity="ForumSujet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sujet", referencedColumnName="id")
     * })
     */
    private $sujet;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteur", referencedColumnName="id")
     * })
     */
    private $auteur;


}

