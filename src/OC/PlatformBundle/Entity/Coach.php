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
class Coach extends Licencier
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;






}