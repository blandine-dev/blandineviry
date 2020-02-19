<?php

namespace App\Repository;

use App\Entity\Pont;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pont|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pont|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pont[]    findAll()
 * @method Pont[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PontRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pont::class);
    }

    // /**
    //  * @return Pont[] Returns an array of Pont objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pont
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
