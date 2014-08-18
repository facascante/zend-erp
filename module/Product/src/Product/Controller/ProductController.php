<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{

    protected $objectTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
              'products' => $this->getProductTable()->fetchAll()
        ));
    }

    public function getProductTable()
    {
        if(!$this->objectTable){
                    		$sm = $this->getServiceLocator();
                    		$this->objectTable = $sm->get('Product\Model\ProductTable');
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

