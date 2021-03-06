<?php

/**
 * Functions related to Products
 *
 * @author Vinod
 *
 * @category Service
 */

namespace AppBundle\Service;

class ProductRequestService extends AbstractService {

    /**
     * Function to return products based on status
     *
     * @param string $status
     *
     * @return array
     */
    public function customProducts($status) 
    {
        $doctrine = $this->getDoctrine();
        $productRepo = $doctrine->getRepository("AppBundle:Product");

        $products = $productRepo->customProducts($status);

        return $products;
    }

    /**
     * Function to return products based on status
     *
     * @param string $category
     *
     * @return array
     */
    public function productsByCategory($category) 
    {
        $doctrine = $this->getDoctrine();
        $productRepo = $doctrine->getRepository("AppBundle:Product");

        $products = $productRepo->getAllProductsByCategory($category);

        return $products;
    }

    /**
     * Function to return combined category name based on status
     *
     * @param string $sku
     *
     * @return array
     */
    public function categoryByProduct($sku) 
    {
        $doctrine = $this->getDoctrine();
        $productRepo = $doctrine->getRepository("AppBundle:Product");

        $categoryNames = $productRepo->getCategoryNamesByProduct($sku);
        $categoryName = "";

        foreach ($categoryNames as $val) {
            $categoryName .= implode($val) . ', ';
        }

        return $categoryName;
    }
    
    /**
     * Function to return products based on search key
     *
     * @param string $searchKey
     *
     * @return array
     */
    public function searchProducts($searchKey)
    {
        $doctrine = $this->getDoctrine();
        $productRepo = $doctrine->getRepository("AppBundle:Product");
        
        $products = $productRepo->findByNameOrKeyWords($searchKey);
        
        return $products;
    }
}
