<?php

/**
 * Functions related to Products
 *
 * @author
 *
 * @category Service
 */
namespace AppBundle\Service;

class ProductRequestService extends AbstractService
{
    /**
     * Function to return products based on status.
     *
     * @param string $status
     *
     * @return array
     */
    public function customProducts($status)
    {
        $doctrine = $this->getDoctrine();
        $productRepo = $doctrine->getRepository("AppBundle:Product");
        
        $products= $productRepo->customProducts($status);
        
        return $products;
    }
}