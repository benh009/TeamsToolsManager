<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 30/08/16
 * Time: 14:39
 */

namespace OC\PlatformBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Province
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

}