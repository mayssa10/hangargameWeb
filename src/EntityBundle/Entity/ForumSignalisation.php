<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumSignalisation
 *
 * @ORM\Table(name="forum_signalisation", indexes={@ORM\Index(name="sujet", columns={"sujet"})})
 * @ORM\Entity
 */
class ForumSignalisation
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
     * @var integer
     *
     * @ORM\Column(name="nb_signalisation", type="integer", nullable=false)
     */
    private $nbSignalisation;

    /**
     * @var \ForumSujet
     *
     * @ORM\ManyToOne(targetEntity="ForumSujet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sujet", referencedColumnName="id")
     * })
     */
    private $sujet;


}

