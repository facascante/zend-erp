<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\User;   
use User\Model\Role;      
use User\Form\UserForm;      

class UserController extends AbstractActionController
{

    protected $userTable = null;
    protected $roleTable = null;
    protected $statusTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
         'users' => $this->getUserTable()->fetchAll()
         ));
    }

    public function addAction()
    {

    	if(!$this->statusTable){
    		$sm = $this->getServiceLocator();
    		$this->statusTable = $sm->get('User\Model\StatusTable');
    	}
    	 if(!$this->roleTable){
    	 	$sm = $this->getServiceLocator();
    		$this->roleTable = $sm->get('User\Model\RoleTable');
    	 }
         $form = new UserForm(array( 'statusTable' => $this->statusTable,'roleTable' => $this->roleTable));
    	          $form->get('submit')->setValue('Save');

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
    public function editAction()
    {
    	 $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('user_add', array(
                'action' => 'add'
            ));
        }
        $user = $this->getUserTable()->getUser($id);
        if(!$this->statusTable){
        	$sm = $this->getServiceLocator();
        	$this->statusTable = $sm->get('User\Model\StatusTable');
        }
         if(!$this->roleTable){
    	 	$sm = $this->getServiceLocator();
    		$this->roleTable = $sm->get('User\Model\RoleTable');
    	 }
         $form = new UserForm(array( 'statusTable' => $this->statusTable,'roleTable' => $this->roleTable));
    	         $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Update');

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
    	 $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('user_del', array(
                'action' => 'del'
            ));
        }
        $user = $this->getUserTable()->getUser($id);
         if(!$this->statusTable){
    	 	$sm = $this->getServiceLocator();
    		$this->statusTable = $sm->get('User\Model\StatusTable');
    	 }
    	 if(!$this->roleTable){
    	 	$sm = $this->getServiceLocator();
    	 	$this->roleTable = $sm->get('User\Model\RoleTable');
    	 }
         $form = new UserForm(array( 'statusTable' => $this->statusTable,'roleTable' => $this->roleTable));
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Update');
        $form->get('fname')->setAttribute('disabled', 'true');
        $form->get('lname')->setAttribute('disabled', 'true');
        $form->get('mname')->setAttribute('disabled', 'true');
        $form->get('email')->setAttribute('disabled', 'true');
        $form->get('role')->setAttribute('disabled', 'true');
        $form->get('key')->setAttribute('disabled', 'true');

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
    public function getUserTable()
    {
        if(!$this->userTable){
        	$sm = $this->getServiceLocator();
        	$this->userTable = $sm->get('User\Model\UserTable');
     	}
     	return $this->userTable;
 	}
 	public function getRoleTable()
 	{
 		if(!$this->roleTable){
 			$sm = $this->getServiceLocator();
 			$this->roleTable = $sm->get('User\Model\RoleTable');
 		}
 		return $this->roleTable;
 	}
}

