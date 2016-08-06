<?php

namespace AppBundle\Entity\Repository;

//use AppBundle\Entity\Product;

class ProductRepository extends GenericRepository
{
    public function customProducts($status, $page = 1, $limit = 5) {
        $products = $this->createQueryBuilder('p')
            ->select('p.name as name')
            ->addSelect('p.description as description')
            ->addSelect('p.image_url as url')   
            ->addSelect('p.price as originalPrice')   
            ->addSelect('p.discount_price as discountPrice')   
            ->join('p.status', 's')
            ->where("s.string_value = :status")  
            ->setParameters(array(
                'status' => $status
            ))    
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getArrayResult()    
        ;
        
        return $products;
    }
}
