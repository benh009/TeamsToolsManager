<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace OC\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Les noms d'utilisateurs à créer
    $listNames = array('Alexandre', 'Marine', 'Anna', 'Hofbauer');



    foreach ($listNames as $name) {
      // On crée l'utilisateur
      $user = new User;

      // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
      $user->setUsername($name);


      $user->setPlainPassword($name);
      
      
      $user->setEmail($name );
      $user->setEnabled(1);
      // On ne se sert pas du sel pour l'instant
      //$user->setSalt('kgijet5gkdcg8ogwkcc0ccgo0ksc408');
      // On définit uniquement le role ROLE_USER qui est le role de base
      $user->setRoles(array('ROLE_ADMIN'));

      // On le persiste
      $manager->persist($user);
    }

    // On déclenche l'enregistrement
    $manager->flush();
  }
}
