<?php

/**
 * Product admin page
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

class ProductAdmin extends BaseAdmin {

    // Fields too be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('name')
                ->add('description')
                ->add('sku')
                ->add('price')
                ->add('discount_price')
                ->add('tax')
                ->add('key_words')
                ->add('image_url')
                ->add('image_url2')
                ->add('image_url3')
                ->add('image_url4')
                ->add('thumbnail_url')
                ->add('status', 'entity', array('class' => 'AppBundle\Entity\Status',
                    'property' => 'string_value',
                    'empty_data' => null,
                    'empty_value' => "Please select a Status",
                ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('name')
                ->add('description')
                ->add('status.string_value')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('name')
                ->add('description')
                ->add('sku')
                ->add('price')
                ->add('discount_price')
                ->add('status.string_value')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit' => array(),
                    ),
                ))
        ;
    }

}
