<?php

/**
 *  Abstract service class used as parent service in other services.
 */
namespace AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;

abstract class AbstractService
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * Set doctrine.
     *
     * @param Registry $doctrine
     */
    public function setDoctrine(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Get doctrine.
     *
     * @return Registry $doctrine
     */
    public function getDoctrine()
    {
        return $this->doctrine;
    }
}
