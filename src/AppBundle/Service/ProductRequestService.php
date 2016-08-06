<?php

/**
 * Generic functions related to home page.
 *
 * @author
 *
 * @category Service
 */
namespace AppBundle\Service;

class ProductRequestService extends AbstractService
{
    /**
     * Function to validate satn.
     *
     * @param array $content
     *
     * @return array
     */
    public function homeProducts()
    {
        $doctrine = $this->getDoctrine();
        $productRepo = $doctrine->getRepository("AppBundle:Product");
        
        $products["featured"] = $productRepo->customProducts('FEATURED');
        $products["latest"] = $productRepo->customProducts('LATEST');
        
        return $products;
    }
}