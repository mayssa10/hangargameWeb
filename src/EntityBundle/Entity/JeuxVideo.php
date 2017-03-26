<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JeuxVideo
 *
 * @ORM\Table(name="jeux_video", indexes={@ORM\Index(name="nom", columns={"nom"}), @ORM\Index(name="nom_console", columns={"console"})})
 * @ORM\Entity
 */
class JeuxVideo
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
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=100, nullable=false)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="date_sortie", type="string", length=255, nullable=true)
     */
    private $dateSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var \Console
     *
     * @ORM\ManyToOne(targetEntity="Console")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="console", referencedColumnName="id")
     * })
     */
    private $console;


}

