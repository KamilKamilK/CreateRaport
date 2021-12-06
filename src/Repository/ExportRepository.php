<?php

namespace App\Repository;

use App\Entity\Export;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Export|null find($id, $lockMode = null, $lockVersion = null)
 * @method Export|null findOneBy(array $criteria, array $orderBy = null)
 * @method Export[]    findAll()
 * @method Export[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Export::class);
    }

    /**
     * @return Export Returns an array of Export objects
     */
    public function findDateByParameters($local, $from, $to)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.name LIKE  :local')
            ->setParameter('local', $local)
            ->andWhere('e.date > :from')
            ->setParameter('from', $from)
            ->andWhere('e.date < :to')
            ->setParameter('to', $to)
            ->orderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();

    }
}
