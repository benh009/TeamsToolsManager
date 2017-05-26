<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 31/08/16
 * Time: 14:36
 */

namespace OC\PlatformBundle\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Arbitre extends Licencier
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;




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




}