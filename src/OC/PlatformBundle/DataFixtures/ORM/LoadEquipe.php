<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 21/08/16
 * Time: 14:28
 */

namespace OC\PlatformBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\CategoryEquipe;
use OC\PlatformBundle\Entity\Equipe;

class LoadEquipe implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $categoryEquipeF1 = new CategoryEquipe();
        $categoryEquipeF1->setSex("F");
        $categoryEquipeF1->setName("D1");
        $manager->persist( $categoryEquipeF1);

        $categoryEquipeF2 = new CategoryEquipe();
        $categoryEquipeF2->setSex("F");
        $categoryEquipeF2->setName("D2");
        $manager->persist( $categoryEquipeF2);

        $categoryEquipeF3 = new CategoryEquipe();
        $categoryEquipeF3->setSex("F");
        $categoryEquipeF3->setName("D1 LFH");
        $manager->persist( $categoryEquipeF3);



        $categoryEquipe1 = new CategoryEquipe();
        $categoryEquipe1->setSex("M");
        $categoryEquipe1->setName("D1");
        $manager->persist( $categoryEquipe1);

        $categoryEquipe2 = new CategoryEquipe();
        $categoryEquipe2->setSex("M");
        $categoryEquipe2->setName("D2");
        $manager->persist( $categoryEquipe2);

        $categoryEquipe3 = new CategoryEquipe();
        $categoryEquipe3->setSex("M");
        $categoryEquipe3->setName("D1 LFH");
        $manager->persist( $categoryEquipe3);





        $equipe1 = new Equipe();
        $equipe1->setName("Fille");
        $equipe1->setCategory($categoryEquipeF3);
        $equipe1->setClub($manager->getRepository("OCPlatformBundle:Club")->findBy(array('matricule' =>'140' ))[0]);


        $equipe2 = new Equipe();
        $equipe2->setName("Premier");
        $equipe2->setCategory($categoryEquipe3);
        $equipe2->setClub($manager->getRepository("OCPlatformBundle:Club")->findBy(array('matricule' =>'140' ))[0]);


        $equipe3 = new Equipe();
        $equipe3->setName("Promo");
        $equipe3->setCategory($categoryEquipe3);
        $equipe3->setClub($manager->getRepository("OCPlatformBundle:Club")->findBy(array('matricule' =>'140' ))[0]);



        $manager->persist($equipe3);
        $manager->persist($equipe2);
        $manager->persist($equipe1);
        $manager->flush();
    }
}