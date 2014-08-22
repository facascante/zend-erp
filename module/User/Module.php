<?php
namespace User;

use User\Model\User;
use User\Model\UserTable;
use User\Model\Role;
use User\Model\RoleTable;
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
    			'User\Model\UserTable' => function($sm){
    				$tableGateway = $sm->get('UserTableGateway');
    				$table = new UserTable($tableGateway);
    				return $table;	
    			},
    			'UserTableGateway' => function ($sm){
    				$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    				$resultSetPrototype = new ResultSet();
    				$resultSetPrototype->setArrayObjectPrototype(new User());
    				return new TableGateway('tbluser',$dbAdapater,null,$resultSetPrototype);
    			},
    			'User\Model\RoleTable' => function($sm){
    				$tableGateway = $sm->get('RoleTableGateway');
    				$table = new RoleTable($tableGateway);
    				return $table;
    			},
    			'RoleTableGateway' => function ($sm){
    				$dbAdapater = $sm->get('Zend\Db\Adapter\Adapter');
    				$resultSetPrototype = new ResultSet();
    				$resultSetPrototype->setArrayObjectPrototype(new Role());
    				return new TableGateway('tblrole',$dbAdapater,null,$resultSetPrototype);
    			}
    		),
    	);
    }
}
