<?php

namespace App\Repository;

use App\Entity\PriceBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceBrand|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceBrand|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceBrand[]    findAll()
 * @method PriceBrand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceBrandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceBrand::class);
    }

    /**
     * @param array $exclude
     *
     * @return PriceBrand[] Returns an array of Brand objects
     */
    public function findAllWithOutExcludedNames(array $exclude): array
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.position', 'ASC');
        if (count($exclude)) {
            $query->andWhere('m.name NOT IN(:val)')
                ->setParameter('val', $exclude);
        }
        return $query->getQuery()
            ->getResult();
    }

    /**
     * @return PriceBrand[] Returns an array of Brand objects
     */
    public function findPopular(): array
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.position', 'ASC')
            ->setMaxResults(26);
        return $query->getQuery()
            ->getResult();
    }

    /**
     * @return PriceBrand[]
     */
    public function findAllWithModels(): array
    {
        return $this->createQueryBuilder('b')
            ->addSelect('m')
            ->orderBy('b.position', 'ASC')
            ->join('b.priceModels', 'm')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return PriceBrand[] Returns an array of PriceBrand objects
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
    public function findOneBySomeField($value): ?PriceBrand
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
