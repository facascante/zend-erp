<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\User;         
use User\Form\UserForm;      

class UserController extends AbstractActionController
{

    protected $objectTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
                			'users' => $this->getUserTable()->fetchAll()
                		));
    }

    public function addAction()
    {
        $form = new UserForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $user = new User();
             $form->setInputFilter($user->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $user->exchangeArray($form->getData());
                 $this->getUserTable()->saveUser($user);
                 return $this->redirect()->toRoute('user_index');
             }
         }
         return array('form' => $form);
    }

    public function getUserTable()
    {
        if(!$this->objectTable){
                			$sm = $this->getServiceLocator();
                			$this->objectTable = $sm->get('User\Model\UserTable');
                		}
                		return $this->objectTable;
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

