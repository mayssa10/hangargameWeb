<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumEvaluation
 *
 * @ORM\Table(name="forum_evaluation", indexes={@ORM\Index(name="sujet", columns={"sujet"})})
 * @ORM\Entity
 */
class ForumEvaluation
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
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

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

