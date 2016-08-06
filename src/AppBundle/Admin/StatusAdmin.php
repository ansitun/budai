<?php

/**
 * StatusAdmin file for Sonata Bundle.
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

class StatusAdmin extends BaseAdmin
{
    // Fields too be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')    
            ->add('string_value')
            ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')    
            ->add('string_value')
            ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('string_value')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                ),
            ))    
        ;
    }
    
    // generate status values
    public function prePersist($entity)
    {
        $entityManager = $this->getModelManager()->getEntityManager($this->getClass());
        $maxId = $entityManager->getRepository('AppBundle:Status')->findMaxById();
        $entity->setValue(1000 + $maxId);
        $entityManager->persist($entity);
    }
}
