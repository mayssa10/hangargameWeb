<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoTest
 *
 * @ORM\Table(name="video_test", indexes={@ORM\Index(name="id", columns={"id"}), @ORM\Index(name="user", columns={"user"}), @ORM\Index(name="console", columns={"console"})})
 * @ORM\Entity
 */
class VideoTest
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
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=256, nullable=false)
     */
    private $genre;

    /**
     * @var \Console
     *
     * @ORM\ManyToOne(targetEntity="Console")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="console", referencedColumnName="id")
     * })
     */
    private $console;

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

