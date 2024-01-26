<?php

namespace App\Repository;

use App\Entity\TransactionDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TransactionDetail>
 *
 * @method TransactionDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransactionDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransactionDetail[]    findAll()
 * @method TransactionDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransactionDetail::class);
    }

//    /**
//     * @return TransactionDetail[] Returns an array of TransactionDetail objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TransactionDetail
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
