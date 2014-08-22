<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Model\Product;
use Product\Form\ProductForm;


class ProductController extends AbstractActionController
{

    protected $objectTable = null;
    protected $userTable = null;
    protected $roleTable = null;


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


        $user = $this->getUserTable()->getUser($id);
        if(!$this->roleTable){
            $sm = $this->getServiceLocator();
            $this->roleTable = $sm->get('User\Model\RoleTable');
        }


        $form->bind($product);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getUserTable()->saveUser($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('user_index');
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


}

