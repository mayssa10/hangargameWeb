<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 03/04/2017
 * Time: 00:31
 */

namespace EntityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * CommentaireProduit
 *
 * @ORM\Table(name="commentaireproduit")
 * @ORM\Entity
 */
class CommentaireProduit
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
     * @ORM\Column(name="commentaire", type="string", length=200, nullable=false)
     */
    private $commentaire;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", length=65535, nullable=false)
     */
    private $date;
    /**
     * @var \integer
     *
     * @ORM\Column(name="store", type="integer",nullable=false)
     */
    private $produit;

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
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param string $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param int $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }


}