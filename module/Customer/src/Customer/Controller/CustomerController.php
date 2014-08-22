<?php

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Customer\Model\Customer;         
use Customer\Form\CustomerForm;      

class CustomerController extends AbstractActionController
{

    protected $customerTable = null;
    protected $categoryTable = null;
    protected $TypeTable = null;
    

    public function indexAction()
    {
        return new ViewModel(array(
         'customers' => $this->getCustomerTable()->fetchAll()
         ));
    }

    public function addAction()
    {

    	 if(!$this->categoryTable){
    	 	$sm = $this->getServiceLocator();
    		$this->categoryTable = $sm->get('Customer\Model\CategoryTable');
    	 }
    	 if(!$this->TypeTable){
    	 	$sm = $this->getServiceLocator();
    	 	$this->TypeTable = $sm->get('Customer\Model\TypeTable');
    	 }
    	  $form = new CustomerForm(array(
         		'categoryTable' => $this->categoryTable,
         		'TypeTable' => $this->TypeTable,
         		
         ));
    	$form->get('submit')->setValue('Save');

         $request = $this->getRequest();
        
         if ($request->isPost()) {
             $customer = new Customer();
             $form->setInputFilter($customer->getInputFilter());
             $form->setData($request->getPost());
           
             if ($form->isValid()) {
                 $customer->exchangeArray($form->getData());
                 $this->getCustomerTable()->saveCustomer($customer);
                 return $this->redirect()->toRoute('customer_index');
             }
         }
         return array('form' => $form);
    }
    public function editAction()
    {
    	return new ViewModel();
    }
    
    public function delAction()
    {
    	return new ViewModel();
    }
    public function getCustomerTable()
    {
        if(!$this->customerTable){
        	$sm = $this->getServiceLocator();
        	$this->customerTable = $sm->get('Customer\Model\CustomerTable');
     	}
     	return $this->customerTable;
 	}
}

