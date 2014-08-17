<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    protected $userTable = null;

    public function indexAction()
    {
        return new ViewModel(array(
                			'users' => $this->getUserTable()->fetchAll()
                		));
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function getUserTable()
    {
        if(!$this->userTable){
                			$sm = $this->getServiceLocator();
                			$this->userTable = $sm->get('User\Model\UserTable');
                		}
                		return $this->userTable;
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

