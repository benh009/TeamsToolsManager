<?php
// src/OC/PlatformBundle/Repository/CategoryRepository.php

namespace OC\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EquipeRepository extends EntityRepository
{
  public function getEquipeClub($club)
  {
    return $this
      ->createQueryBuilder('e')->innerJoin('e.club', 'c')
      ->where('c.id LIKE :club')
      ->setParameter('club', $club)
    ;



  }
}
