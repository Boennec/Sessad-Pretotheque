<?php

namespace App\Repository;

use App\Entity\CategoryEmprunteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryEmprunteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryEmprunteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryEmprunteur[]    findAll()
 * @method CategoryEmprunteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryEmprunteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryEmprunteur::class);
    }

    // /**
    //  * @return CategoryEmprunteur[] Returns an array of CategoryEmprunteur objects
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
    public function findOneBySomeField($value): ?CategoryEmprunteur
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
