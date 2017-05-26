<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 30/08/16
 * Time: 14:28
 */

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Club
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;




    /**
     * @ORM\Column(name="province", type="string", length=255)
     */
    protected $province;


    /**
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    protected $matricule;



    /**
     * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\Equipe", mappedBy="club")
     */
    protected $equipes ;

    /**
     * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\Joueur", mappedBy="club")
     */
    protected  $joueurs ;




    /**
     * @ORM\OneToMany(targetEntity="OC\UserBundle\Entity\User", mappedBy="club")
     */
    protected  $userconnect ;


    /**
     * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\Coach", mappedBy="club")
     */
    protected  $coachs ;




    /**
     * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\Comite", mappedBy="club")
     */
    protected  $comites ;

    /**
     * @return mixed
     */
    public function getUserconnect()
    {
        return $this->userconnect;
    }

    /**
     * @param mixed $userconnect
     */
    public function setUserconnect($userconnect)
    {
        $this->userconnect = $userconnect;
    }





    /**
     * @return mixed
     */
    public function getComites()
    {
        return $this->comites;
    }

    /**
     * @param mixed $comites
     */
    public function setComites($comites)
    {
        $this->comites = $comites;
    }

    /**
     * @return mixed
     */
    public function getCoachs()
    {
        return $this->coachs;
    }

    /**
     * @param mixed $coachs
     */
    public function setCoachs($coachs)
    {
        $this->coachs = $coachs;
    }

    /**
     * @return mixed
     */
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    /**
     * @param mixed $joueurs
     */
    public function setJoueurs($joueurs)
    {
        $this->joueurs = $joueurs;
    }

    /**
     * @return mixed
     */
    public function getEquipes()
    {
        return $this->equipes;
    }

    /**
     * @param mixed $equipes
     */
    public function setEquipes($equipes)
    {
        $this->equipes = $equipes;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }
    public function __toString()
    {
        return $this->name;
    }



}