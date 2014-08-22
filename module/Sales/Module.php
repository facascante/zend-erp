<?php
namespace Sales;

use Sales\Model\Order;
use Sales\Model\OrderTable;
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
    					'Sales\Model\OrderTable' => function($sm){
    						$tableGateway = $sm->get('OrderTableGateway');
    						$table = new OrderTable($tableGateway);
    						return $table;
    					},
    					'OrderTableGateway' => function ($sm){
    						$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Order());
    						return new TableGateway('tblsales',$dbAdapater,null,$resultSetPrototype);
    					}
    			),
    	);
    }
}
