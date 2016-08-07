<?php

/**
 * Category Repository.
 *
 * @author Vinod
 *
 * @category Repository class
 */
namespace AppBundle\Entity\Repository;

class CategoryRepository extends GenericRepository
{
    public function getActiveCategories() {
        $categories = $this->createQueryBuilder('c')
            ->select('c.id as id')
            ->addselect('c.name as name')
            ->addSelect('c.description as description')
            ->join('c.status', 's')
            ->where("s.string_value NOT IN ('DELETED', 'INACTIVE')")  
            ->getQuery()
            ->getArrayResult()    
        ;
        
        return $categories;
    }
}
