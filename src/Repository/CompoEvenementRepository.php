<?php

namespace App\Repository;

use App\Entity\CompoEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CompoEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompoEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompoEvenement[]    findAll()
 * @method CompoEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompoEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompoEvenement::class);
    }

    // /**
    //  * @return CompoEvenement[] Returns an array of CompoEvenement objects
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
    public function findOneBySomeField($value): ?CompoEvenement
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
