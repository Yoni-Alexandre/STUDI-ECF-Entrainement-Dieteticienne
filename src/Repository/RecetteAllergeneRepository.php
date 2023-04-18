<?php

namespace App\Repository;

use App\Entity\RecetteAllergene;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecetteAllergene>
 *
 * @method RecetteAllergene|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecetteAllergene|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecetteAllergene[]    findAll()
 * @method RecetteAllergene[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteAllergeneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecetteAllergene::class);
    }

    public function save(RecetteAllergene $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RecetteAllergene $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RecetteAllergene[] Returns an array of RecetteAllergene objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RecetteAllergene
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
