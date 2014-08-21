<?php
namespace Product;

use Product\Model\Product;
use Product\Model\ProductTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Product\Model\ProductTable' => function($sm){
    						$tableGateway = $sm->get('ProductTableGateway');
    						$table = new ProductTable($tableGateway);
    						return $table;
    					},
    					'ProductTableGateway' => function ($sm){
    						$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Product());
    						return new TableGateway('tblproduct',$dbAdapater,null,$resultSetPrototype);
    					},



                       'Product\Model\CategoryTable' => function($sm){
                            $tableGateway = $sm->get('CategoryTableGateway');
                            $table = new CategoryTable($tableGateway);
                            return $table;
                        },
                       'CategoryTableGateway' => function ($sm){
                            $dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
                            $resultSetPrototype = new ResultSet();
                            $resultSetPrototype->setArrayObjectPrototype(new Product());
                            return new TableGateway('tblproductcategory',$dbAdapater,null,$resultSetPrototype);
                        },



                       'Product\Model\SubCategoryTable' => function($sm){
                            $tableGateway = $sm->get('SubCategoryTableGateway');
                            $table = new SubCategoryTable($tableGateway);
                            return $table;
                        },
                       'SubCategoryTableGateway' => function ($sm){
                            $dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
                            $resultSetPrototype = new ResultSet();
                            $resultSetPrototype->setArrayObjectPrototype(new Product());
                            return new TableGateway('tblproductsubcategory',$dbAdapater,null,$resultSetPrototype);
                        },
    			),
    	);
    }
}
