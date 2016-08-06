<?php

/**
 * BlogCategory Admin file for Sonata Bundle.
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

class CategoryAdmin extends BaseAdmin
{
    // Fields too be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('description')  
            ->add('status', 'entity', array('class' => 'AppBundle\Entity\Status', 
                    'property' => 'string_value',
                    'empty_data'  => null,
                    'empty_value' => "Please select a Status",
                    ))      
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')  
            ->add('status.string_value')    
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('description')  
            ->add('status.string_value')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                ),
            ))
        ;
    }
}
