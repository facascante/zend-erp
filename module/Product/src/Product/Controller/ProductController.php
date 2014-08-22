<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Model\Product;
use Product\Form\ProductForm;
//use Product\Model\Brand;
//use Product\Form\BrandForm;


class ProductController extends AbstractActionController
{

    protected $productTable = null;
    protected $brandTable = null;
    protected $categoryTable = null;
    protected $subcategoryTable = null;
    protected $supplierTable = null;
    protected $uomTable = null;



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


    public function editAction()
    {
        //route to add view if id==empty
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('product_add', array(
                'action' => 'add'
            ));
        }


        $product = $this->getProductTable()->getProduct($id);

        //controllers for MODELS
        if(!$this->brandTable){
            $sm = $this->getServiceLocator();
            $this->brandTable = $sm->get('Product\Model\BrandTable');
        }

        if(!$this->categoryTable){
            $sm = $this->getServiceLocator();
            $this->categoryTable = $sm->get('Product\Model\CategoryTable');
        }

        if(!$this->subcategoryTable){
            $sm = $this->getServiceLocator();
            $this->subcategoryTable = $sm->get('Product\Model\SubCategoryTable');
        }

        if(!$this->uomTable){
            $sm = $this->getServiceLocator();
            $this->uomTable = $sm->get('Product\Model\UOMTable');
        }


        if(!$this->supplierTable){
            $sm = $this->getServiceLocator();
            $this->supplierTable = $sm->get('Product\Model\SupplierTable');
        }

        //set forms elements
        $form = new ProductForm(array(
            'brandTable' => $this->BrandTable,
            'categoryTable' => $this->CategoryTable,
            'subcategoryTable' => $this->SubCategoryTable,
            'uomTable' => $this->UOMTable,
            'supplierTable' => $this->SupplierTable,
        ));

        //set to values to edit forms
        $form->bind($product);
        $form->get('submit')->setAttribute('value', 'Edit');


        //after editing
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getProductTable()->saveproduct($form->getData());

        // Redirect to list of products
                return $this->redirect()->toRoute('product_index');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }





    public function delAction()
    {
        return new ViewModel();
    }

    public function getProductTable()
    {
        if(!$this->objectTable){
            $sm = $this->getServiceLocator();
            $this->objectTable = $sm->get('Product\Model\ProductTable');
        }
        return $this->objectTable;
    }


}

