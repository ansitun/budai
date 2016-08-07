<?php
/*
 * Product repository
 * 
 * @author Vinod
 *
 * @category Repository class
 */


namespace AppBundle\Entity\Repository;

class ProductRepository extends GenericRepository
{
    /*
     * Function to return products based on status value
     */
    public function customProducts($status, $page = 1, $limit = 5) {
        $products = $this->createQueryBuilder('p')
            ->select('p.name as name')
            ->addSelect('p.description as description')
            ->addSelect('p.image_url as url')   
            ->addSelect('p.price as originalPrice')   
            ->addSelect('p.discount_price as discountPrice')
            ->addSelect('p.sku as sku')
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
    
    /*
     * Function to return all active products based on sku value
     */
    public function getProductsBySku($sku) {
        $products = $this->createQueryBuilder('p')
            ->select('p.id as id')
            ->addselect('p.name as name')
            ->addSelect('p.description as description')
            ->addSelect('p.image_url as url')
            ->addSelect('p.image_url2 as url2')
            ->addSelect('p.image_url3 as url3')
            ->addSelect('p.image_url4 as url4')    
            ->addSelect('p.price as originalPrice')   
            ->addSelect('p.discount_price as discountPrice')
            ->addSelect('p.sku as sku')
            ->addSelect('p.key_words as tags')
            ->join('p.status', 's')
            ->where("s.string_value NOT IN ('DELETED', 'INACTIVE')")  
            ->andWhere("p.sku = :sku")
            ->setParameter('sku', $sku)    
            ->getQuery()
            ->getArrayResult()
        ;
        
        return $products;
        
    }
    
    /*
     * Function to return all active products based on category
     */
    public function getAllProductsByCategory($category) {
        $products = $this->createQueryBuilder('p')
            ->select('p.name as name')
            ->addSelect('p.description as description')
            ->addSelect('p.image_url as url')   
            ->addSelect('p.price as originalPrice')   
            ->addSelect('p.discount_price as discountPrice')
            ->addSelect('p.sku as sku')
            ->leftJoin('AppBundle:ProductCategory', 'pc', \Doctrine\ORM\Query\Expr\Join::WITH, 'pc.product = p')
            ->join('pc.category', 'c')
            ->join('c.status', 'cs')
            ->join('p.status', 'ps')
            ->where("ps.string_value NOT IN ('DELETED', 'INACTIVE')")
            ->andWhere("cs.string_value NOT IN ('DELETED', 'INACTIVE')")
            ->andWhere("c.id = :category")
            ->setParameter('category', $category)
            ->getQuery()
            ->getArrayResult()
        ;
        
        return $products;
    }
    
    /*
     * Function to return all active products based on category
     */
    public function getCategoryNamesByProduct($sku) {
        $category = $this->createQueryBuilder('p')
            ->select('DISTINCT(c.name) as name')
            ->leftJoin('AppBundle:ProductCategory', 'pc', \Doctrine\ORM\Query\Expr\Join::WITH, 'pc.product = p')
            ->join('pc.category', 'c')
            ->join('c.status', 'cs')
            ->join('p.status', 'ps')
            ->where("ps.string_value NOT IN ('DELETED', 'INACTIVE')")
            ->andWhere("cs.string_value NOT IN ('DELETED', 'INACTIVE')")
            ->andWhere("p.sku = :sku")
            ->setParameter('sku', $sku)
            ->getQuery()
            ->getArrayResult()
        ;
        
        return $category;
    }
}
