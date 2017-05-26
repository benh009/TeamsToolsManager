<?php
// src/OC/PlatformBundle/Entity/Joeur.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OC\PlatformBundle\Entity\Image;

/**
* @ORM\Entity
*/
class Joueur extends Licencier
{

      /**
       * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Equipe",inversedBy="joueurs")
       */
      protected $equipes;

    /**
     * @ORM\Column(name="SizeVareuse", type="string", length=10)
     */
    protected $sizeVareuse;

    /**
     * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Position",mappedBy="joueurs")
     */
    protected $positions ;





    /**
     * @return mixed
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param mixed $positions
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
    }


    /**
     * @return mixed
     */
    public function getSizeVareuse()
    {
        return $this->sizeVareuse;
    }

    /**
     * @param mixed $sizeVareuse
     */
    public function setSizeVareuse($sizeVareuse)
    {
        $this->sizeVareuse = $sizeVareuse;
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




  // Et bien sûr les getters/setters :

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }



}