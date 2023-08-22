<?php
namespace App\Repository;

use App\Entity\GameWord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameWord|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameWord|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameWord[]    findAll()
 * @method GameWord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameWordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameWord::class);
    }

    public function findAllWords(): array
    {
        return $this->createQueryBuilder('g')
            ->select('g.word')
            ->getQuery()
            ->getArrayResult();
    }
}


//    /**
//     * @return GameWord[] Returns an array of GameWord objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GameWord
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

