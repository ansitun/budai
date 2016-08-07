<?php

/**
 * Base Admin file for the common operations to be used by all admins
 *
 * @author
 *
 * @category Admin
 */
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use AppBundle\DataSourceIterator\AppORMQuerySourceIterator;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;

class BaseAdmin extends Admin 
{
    protected $listModes = array(
        'list' => array(
            'class' => 'fa fa-list fa-fw',
        )
    );
    
    /*
     * Actions to be shown in the list page
     * 
     * @return array
     */
    protected function addActions(ListMapper $listMapper)
    {
        $listMapper->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                ),
             ));
        return true;
    }
}