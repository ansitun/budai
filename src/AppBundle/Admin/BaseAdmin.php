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
    
//    /**
//     * Function to get custom data source iterator to customize exports
//     * 
//     * @return AppORMQuerySourceIterator
//     */
//    public function getDataSourceIterator()
//    {
//        $datagrid = $this->getDatagrid();
//        $datagrid->buildPager();
//        $fields=$this->getExportFields();
//        $query = $datagrid->getQuery();
//        $query->select('DISTINCT ' . $query->getRootAlias());
//        $query->setFirstResult(null);
//        $query->setMaxResults(null);
//
//        if ($query instanceof ProxyQueryInterface) {
//            
//            if($query->getSortBy()) {
//                $query->addOrderBy($query->getSortBy(), $query->getSortOrder());
//            }
//            $query = $query->getQuery();
//        }
//
//        $dsi = new AppORMQuerySourceIterator($query, $fields, 'Y-m-d H:i:s');
//        $dsi->setTimezone('Asia/Rangoon'); // falling back to MMT
//
//        return $dsi;
//    }
}