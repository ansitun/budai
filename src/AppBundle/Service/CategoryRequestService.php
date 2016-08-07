<?php

/**
 * Functions related to Category
 *
 * @author Vinod
 *
 * @category Service
 */
namespace AppBundle\Service;

class CategoryRequestService extends AbstractService
{
    /**
     * Function to return products based on status.
     *
     * @param string $status
     *
     * @return array
     */
    public function getAllCategory()
    {
        $doctrine = $this->getDoctrine();
        $categoryRepo = $doctrine->getRepository("AppBundle:Category");
        
        $category = $categoryRepo->getActiveCategories($status);
        
        return $category;
    }
}