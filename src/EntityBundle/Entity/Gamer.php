<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gamer
 *
 * @ORM\Table(name="gamer", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_88241BA792FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_88241BA7A0D96FBF", columns={"email_canonical"}), @ORM\UniqueConstraint(name="UNIQ_88241BA7C05FB297", columns={"confirmation_token"})})
 * @ORM\Entity
 */
class Gamer
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

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=180, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=180, nullable=false)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=180, nullable=false)
     */
    private $emailCanonical;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token", type="string", length=180, nullable=true)
     */
    private $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=false)
     */
    private $roles;


}

