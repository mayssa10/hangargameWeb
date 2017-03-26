<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireVideo
 *
 * @ORM\Table(name="commentaire_video", indexes={@ORM\Index(name="idvideo", columns={"idvideo"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class CommentaireVideo
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
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

    /**
     * @var \Gamer
     *
     * @ORM\ManyToOne(targetEntity="Gamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \VideoTest
     *
     * @ORM\ManyToOne(targetEntity="VideoTest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idvideo", referencedColumnName="id")
     * })
     */
    private $idvideo;


}

