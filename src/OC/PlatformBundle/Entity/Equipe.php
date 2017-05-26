<?php
// src/OC/PlatformBundle/Entity/Equipe.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
* @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\EquipeRepository")
*/
 class Equipe
{
  /**
  * @ORM\Column(name="id", type="integer")
  * @ORM\id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  protected $id;


  /**
   * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Joueur",mappedBy="equipes", cascade={"persist"})
   */
  protected $joueurs ;
    

    /**
     * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\CategoryEquipe", inversedBy="equipes")
     * @ORM\JoinColumn
     */
  protected $category;

    /**
   * @ORM\Column(name="name", type="string", length=255)
   */
  protected $name;
    /**
     * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\Club", inversedBy="equipes")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $club;

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
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

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }

    public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
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

    public function __toString() {
        return $this->name;
    }

}