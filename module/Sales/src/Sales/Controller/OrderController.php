<?php

namespace Sales\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Sales\Model\Order;   
use Sales\Form\OrderForm;      

class OrderController extends AbstractActionController
{

	protected $customerTable = null;
	protected $transactionTypeTable = null;
    public function indexAction()
    {
    	
    	$dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    	$result = $dbAdapter->query("SELECT a.id AS id,a.sono AS sono, b.name AS customer FROM tblsales a INNER JOIN tblcustomer b ON a.customer = b.id", $dbAdapter::QUERY_MODE_EXECUTE);
    
         return new ViewModel(array(
         'orders' => $result
         ));
    }

    public function addAction()
    {
       
    	if(!$this->customerTable){
    		$sm = $this->getServiceLocator();
    		$this->orderTable = $sm->get('Sales\Model\CustomerTable');
    	}

         $form = new OrderForm(array( 'orderTable' => $this->orderTable));
    	 $form->get('submit')->setValue('Save');
         return array('form' => $form);
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function voidAction()
    {
        return new ViewModel();
    }
    public function getOrderTable()
    {
    	if(!$this->orderTable){
    		$sm = $this->getServiceLocator();
    		$this->orderTable = $sm->get('Sales\Model\OrderTable');
    	}
    	return $this->orderTable;
    }


}

