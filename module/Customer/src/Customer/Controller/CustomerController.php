<?php

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CustomerController extends AbstractActionController
{

    protected $objectTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
              'customers' => $this->getCustomerTable()->fetchAll()
        ));
    }

    public function getCustomerTable()
    {
        if(!$this->objectTable){
                    		$sm = $this->getServiceLocator();
                    		$this->objectTable = $sm->get('Customer\Model\CustomerTable');
                    	}
                    	return $this->objectTable;
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function delAction()
    {
        return new ViewModel();
    }


}

