<?php

/**
 * Product Category Admin file for Sonata Bundle.
 *
 * @author
 *
 * @category Admin
 */
namespace AppBundle\Admin;

use AppBundle\Admin\BaseAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductCategoryAdmin extends BaseAdmin
{
    // Fields too be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('product', 'entity', array('class' => 'AppBundle\Entity\Product', 
                    'property' => 'name',
                    'empty_data'  => null,
                    'empty_value' => "Please select a Product",
                    )) 
            ->add('category', 'entity', array('class' => 'AppBundle\Entity\Category', 
                    'property' => 'name',
                    'empty_data'  => null,
                    'empty_value' => "Please select a Category",
                    ))  
            ->add('user', 'entity', array('class' => 'AppBundle\Entity\User', 
                    'property' => 'username',
                    'empty_data'  => null,
                    'empty_value' => "Please select the user",
                    ))      
            ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('product.name')
            ->add('category.name')    
            ->add('user.username') 
            ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('product.name')
            ->add('category.name')    
            ->add('user.username') 
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                ),
            ))    
        ;
    }
}
