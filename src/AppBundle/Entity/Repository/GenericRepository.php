<?php

/**
 * Generic Repository.
 *
 * @author Ansu
 *
 * @category Repository class
 */
namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class GenericRepository extends EntityRepository
{
    /**
     * Generic Repository function to find the Max Id.
     */
    public function findMaxById()
    {
        $maxId = $this->createQueryBuilder('m')
            ->select('MAX(m.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $maxId;
    }
}
