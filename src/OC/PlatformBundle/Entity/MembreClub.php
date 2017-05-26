<?php
/**
 * Created by PhpStorm.
 * User: hofbauerB
 * Date: 9/04/17
 * Time: 16:37
 */

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *  @ORM\Entity
 *  @ORM\InheritanceType("JOINED")
 *  @ORM\DiscriminatorColumn(name="discr", type="string")
 *  @ORM\DiscriminatorMap({"membreClub" = "MembreClub", "coach" = "Coach", "joueur"="Joueur", "comite"="Comite"})
 */
class MembreClub extends Personne
{


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\Club", inversedBy="joueurs")
     * @ORM\JoinColumn()
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
}