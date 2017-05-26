<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadJoueur.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Joueur;

class LoadJoueur implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {

    $joueur = new Joueur();
    $joueur->setFirstName("Ben");
    $joueur->setLastName("Hofbauer");
    $joueur->setEmail("benoit.hofbauer@gmail.com");
    $joueur->setBirthday( new \Datetime());
    $joueur->setSex("M");
    $joueur->setLicence("2E24R2");
    $joueur->setGsm("0470506138");
      $joueur->setSizeVareuse("M");
    $manager->persist($joueur);

    $joueur2 = new Joueur();
    $joueur2->setFirstName("Helene");
    $joueur2->setLastName("Hofbauerr");
    $joueur2->setEmail("Helene.hofbauer@gmail.com");
    $joueur2->setBirthday( new \Datetime());
    $joueur2->setLicence("2E24R2");
    $joueur2->setSex("F");
    $joueur2->setSizeVareuse("M");

    $joueur2->setGsm("0470506138");
    $manager->persist($joueur2);
    

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}