<?php

/**
 * UserAdmin for CRUD operations on User Entity
 *
 * @author
 *
 * @category Admin
 */
namespace AppBundle\Admin;

use AppBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
//use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
//use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends BaseAdmin
{
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('username')
            ->add('email')   
            ->add('enabled')    
            ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('username')
            ->add('email')  
            ->add('enabled')    
        ;
    }
    
    /*
     * Restricting access to list routes only
     * 
     * @return array
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array('list'));
            
    }
}
