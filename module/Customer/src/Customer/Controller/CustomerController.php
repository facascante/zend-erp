<?php

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Customer\Model\Customer;         
use Customer\Form\CustomerForm;      

class CustomerController extends AbstractActionController
{

    protected $customerTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
         'users' => $this->getCustomerTable()->fetchAll()
         ));
    }

    public function addAction()
    {

         $form = new CustomerForm();
    	          $form->get('submit')->setValue('Save');

         $request = $this->getRequest();
        
         if ($request->isPost()) {
             $user = new Customer();
             $form->setInputFilter($user->getInputFilter());
             $form->setData($request->getPost());
           
             if ($form->isValid()) {
                 $user->exchangeArray($form->getData());
                 $this->getCustomerTable()->saveCustomer($user);
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

