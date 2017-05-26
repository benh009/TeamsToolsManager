<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 30/08/16
 * Time: 17:26
 */

namespace OC\PlatformBundle\Entity;




use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Comite extends MembreClub
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="role", type="string", length=255)
     */
    protected $role;

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }











}