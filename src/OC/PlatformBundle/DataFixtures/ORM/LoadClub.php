<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 30/08/16
 * Time: 14:33
 */

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Club;

class LoadClub implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {

        $club1 = new Club();
        $club1->setName('ASSOCIATION HANDBALL CLUB BRAINE-OTTIGNIES');

        $club1->setMatricule('616');
        $club1->setProvince('Brabant');
        $manager->persist($club1);


        $club2 = new Club();


        $club2->setName('ENTENTE DU CENTRE CHAPELLE LA HESTRE');
        $club2->setMatricule('140');
        $club2->setProvince('Hainaut');
        $manager->persist($club2);


        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}
