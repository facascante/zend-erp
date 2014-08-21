<?php

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Customer\Model\Customer;
use Customer\Form\CustomerForm;

class CustomerController extends AbstractActionController
{

    protected $objectTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
            'customers' => $this->getCustomerTable()->fetchAll()
        ));
    }



    public function addAction()
    {
        $form = new CustomerForm();
        $form->get('submit')->setValue('Add');

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





    public function getCustomerTable()
    {
        if(!$this->objectTable){
            $sm = $this->getServiceLocator();
            $this->objectTable = $sm->get('Customer\Model\CustomerTable');
        }
        return $this->objectTable;
    }







    public function editAction()
    {

        $form = new CustomerForm();
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






    public function delAction()
    {
        return new ViewModel();
    }


}

