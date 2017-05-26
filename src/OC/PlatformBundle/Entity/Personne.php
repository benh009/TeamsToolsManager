<?php
/**
 * Created by PhpStorm.
 * User: hofbauerB
 * Date: 9/04/17
 * Time: 16:32
 */

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"personne" = "Personne", "licencier"="Licencier","arbitre"="Arbitre", "membreClub" = "MembreClub", "coach" = "Coach", "joueur"="Joueur", "comite"="Comite"})
 */
class Personne
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\OneToOne(targetEntity="OC\PlatformBundle\Entity\Image", cascade={"persist", "remove"})
     *
     */
    private $image;


    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    protected $lastName;


    /**
     * @ORM\Column(name="gsm", type="string", length=255, nullable=true)
     */
    protected $gsm;

    /**
     * @ORM\Column(name="sex", type="string", length=1)
     */
    protected $sex;



    /**
     * @ORM\Column(name="birthday", type="date",nullable=true)
     */
    protected $birthday;

    /**
     * @ORM\Column(name="email", type="string", length=255,nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(name="weight", type="integer",nullable=true)
     */
    protected $weight;


    /**
     * @ORM\Column(name="height", type="integer",nullable=true)
     */
    protected $height ;


    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getDisplayName()
    {
        return $this->firstName .' ' .$this->lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName= $firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName= $lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }



    public function getBirthday()
    {
        return $this->birthday;
    }


    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }


    public function getSex()
    {
        return $this->sex;
    }


    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getGsm()
    {
        return $this->gsm;
    }


    public function setGsm($gsm)
    {
        $this->gsm= $gsm;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }




    // Et bien sûr les getters/setters :

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }


    public function __toString()
    {
        return ($this->lastName .' '. $this->firstName);
    }

}