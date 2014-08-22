<?php
namespace Customer;

use Customer\Model\Customer;
use Customer\Model\CustomerTable;
use Customer\Model\Category;
use Customer\Model\CategoryTable;
use Customer\Model\Type;
use Customer\Model\TypeTable;
use Customer\Model\Paymentterm;
use Customer\Model\PaymenttermsTable;

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
    					'Customer\Model\CustomerTable' => function($sm){
    						$tableGateway = $sm->get('CustomerTableGateway');
    						$table = new CustomerTable($tableGateway);
    						return $table;
    					},
    					'CustomerTableGateway' => function ($sm){
    						$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Customer());
    						return new TableGateway('tblcustomer',$dbAdapater,null,$resultSetPrototype);
    					},
    					'Customer\Model\CategoryTable' => function($sm){
    						$tableGateway = $sm->get('CategoryTableGateway');
    						$table = new CategoryTable($tableGateway);
    						return $table;
    					},
    					'CategoryTableGateway' => function ($sm){
    						$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Category());
    						return new TableGateway('tblcustomercategory',$dbAdapater,null,$resultSetPrototype);
    					},
    					'Customer\Model\TypeTable' => function($sm){
    						$tableGateway = $sm->get('TypeTableGateway');
    						$table = new TypeTable($tableGateway);
    						return $table;
    					},
    					'TypeTableGateway' => function ($sm){
    						$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Type());
    						return new TableGateway('tblcustomertype',$dbAdapater,null,$resultSetPrototype);
    					},
    					'Customer\Model\PaymenttermsTable' => function($sm){
    						$tableGateway = $sm->get('paymenttermsTableGateway');
    						$table = new PaymenttermsTable($tableGateway);
    						return $table;
    					},
    					'paymenttermsTableGateway' => function ($sm){
    						$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Paymentterm());
    						return new TableGateway('tblpaymentterms',$dbAdapater,null,$resultSetPrototype);
    					}
    			),
    	);
    }
}
