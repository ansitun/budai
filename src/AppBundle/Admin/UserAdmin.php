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
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends BaseAdmin
{
    // Fields too be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('amount')
//            ->add('fee_amount')
//            ->add('token')
//            ->add('trans_ref')
//            ->add('metro_trans_ref')
//            ->add('is_kyc_challenged')
//            ->add('kyc_status')
//            ->add('kyc_id')
//            ->add('first_name')
//            ->add('last_name')
//            ->add('phone_number')
//            ->add('image_url')
//            ->add('kyc_level')
//            ->add('transaction_type', 'entity', array('class' => 'AppBundle\Entity\TransactionType', 'property' => 'name'))
//            ->add('fee', 'entity', array('class' => 'AppBundle\Entity\Fee', 'property' => 'name'))
//            ->add('transaction_status', 'entity', array('class' => 'AppBundle\Entity\TransactionStatus', 'property' => 'name'))
//            ->add('currency', 'entity', array('class' => 'AppBundle\Entity\Currency', 'property' => 'name'))
//            ->add('terminal_id')
        ;
        
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('username')
            ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('username')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array()
                )
            ))
        ;
    }
    
    /*
     * Restricting access to list and show routes only
     * 
     * @return array
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array('list', 'show', 'edit', 'batch', 'show'));
            
    }
    
//    // To show fields 
//    protected function configureShowFields(ShowMapper $show)
//    {
//        $show->add('amount')
//            ->add('fee_amount')
//            ->add('token')
//            ->add('trans_ref')
//            ->add('metro_trans_ref')
//            ->add('is_kyc_challenged')
//            ->add('kyc_status')
//            ->add('kyc_id')
//            ->add('first_name')
//            ->add('last_name')
//            ->add('phone_number')
//            ->add('kyc_level')
//            ->add('transaction_type.name')
//            ->add('fee.name')
//            ->add('transaction_status.name')
//            ->add('currency.name')
//            ->add('terminal_id')
//            ->add('transaction_logs.wc_req')
//            ->add('transaction_logs.wc_res')
//            ->add('transaction_logs.metro_res')
//            ->add('created_at') 
//            ->add('updated_at')
//        ;
//    }

    
}
