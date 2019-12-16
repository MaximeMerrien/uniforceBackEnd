<?php

namespace App\Repository;

use App\Entity\CompoEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CompoEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompoEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompoEquipe[]    findAll()
 * @method CompoEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompoEquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompoEquipe::class);
    }

    // /**
    //  * @return CompoEquipe[] Returns an array of CompoEquipe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompoEquipe
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
