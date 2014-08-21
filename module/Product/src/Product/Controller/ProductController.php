<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Model\Product;
use Product\Form\ProductForm;


class ProductController extends AbstractActionController
{

    protected $objectTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
            'products' => $this->getProductTable()->fetchAll()
        ));
    }



    public function addAction()
    {
        $form = new ProductForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $product = new Product();
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $product->exchangeArray($form->getData());
                $this->getProductTable()->saveProduct($product);
                return $this->redirect()->toRoute('product_index');
            }
        }
        return array('form' => $form);
    }




    public function getProductTable()
    {
        if(!$this->objectTable){
            $sm = $this->getServiceLocator();
            $this->objectTable = $sm->get('Product\Model\ProductTable');
        }
        return $this->objectTable;
    }




    public function editAction()
    {
        $form = new ProductForm();
        $form->get('submit')->setValue('Save');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $product = new Product();
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $product->exchangeArray($form->getData());
                $this->getProductTable()->saveProduct($product);
                return $this->redirect()->toRoute('product_index');
            }
        }
        return array('form' => $form);
    }





    public function delAction()
    {
        return new ViewModel();
    }


}

