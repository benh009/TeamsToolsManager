<?php
/**
 * Created by PhpStorm.
 * User: hofbauerB
 * Date: 9/04/17
 * Time: 16:39
 */

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *  @ORM\Entity
 *  @ORM\InheritanceType("JOINED")
 *  @ORM\DiscriminatorColumn(name="discr", type="string")
 *  @ORM\DiscriminatorMap({"membreClub" = "MembreClub", "coach" = "Coach", "joueur"="Joueur"})
 */
class Licencier extends MembreClub
{


    /**
     * @ORM\Column(name="licence", type="string", length=255)
     */
    protected $licence ;

    /**
     * @ORM\Column(name="licenceStatus", type="boolean")
     */
    protected $licenceStatus = false ;


    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    public function getLicence()
    {
        return $this->licence;
    }


    public function setLicence($licence)
    {
        $this->licence = $licence;
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


    /**
     * @return mixed
     */
    public function getLicenceStatus()
    {
        return $this->licenceStatus;
    }

    /**
     * @param mixed $licenceStatus
     */
    public function setLicenceStatus($licenceStatus)
    {
        $this->licenceStatus = $licenceStatus;
    }
}