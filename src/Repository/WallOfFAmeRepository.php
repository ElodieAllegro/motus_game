<?php

namespace App\Repository;

use App\Entity\WallOfFAme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WallOfFAme>
 *
 * @method WallOfFAme|null find($id, $lockMode = null, $lockVersion = null)
 * @method WallOfFAme|null findOneBy(array $criteria, array $orderBy = null)
 * @method WallOfFAme[]    findAll()
 * @method WallOfFAme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WallOfFAmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WallOfFAme::class);
    }

//    /**
//     * @return WallOfFAme[] Returns an array of WallOfFAme objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WallOfFAme
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
