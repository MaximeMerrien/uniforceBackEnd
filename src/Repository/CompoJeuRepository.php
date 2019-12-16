<?php

namespace App\Repository;

use App\Entity\CompoJeu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CompoJeu|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompoJeu|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompoJeu[]    findAll()
 * @method CompoJeu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompoJeuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompoJeu::class);
    }

    // /**
    //  * @return CompoJeu[] Returns an array of CompoJeu objects
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
    public function findOneBySomeField($value): ?CompoJeu
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
