<?php
namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
	protected $gatewayTable;
	
	public function setGatewayTable($gatewayTable){
		$this->gatewayTable = $gatewayTable;
	}
	public function getGatewayTable(){
		return $this->gatewayTable;
	}
	public function __construct($gateway)
	{
		parent::__construct('user');
		$this->setGatewayTable($gateway);
		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'fname',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter First Name',
						'id' => 'fname',
				)
		));
		$this->add(array(
				'name' => 'mname',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Middle Name',
						'id' => 'mname',
				)
		));
		$this->add(array(
				'name' => 'lname',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Last Name',
						'id' => 'lname',
				)
		));
		$this->add(array(
				'name' => 'email',
				'type' => 'email',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Valid Email',
						'id' => 'email',
				)
		));
		$this->add(array(
				'name' => 'role_id',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_role form-control',
						'data-placeholder' => 'Choose a Role',
						'tabindex' => '1',
						'id' => 'role_id',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['roleTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'key',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Username',
						'id' => 'key',
				)
		));
		$this->add(array(
				'name' => 'secret',
				'type' => 'password',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Password',
						'id' => 'secret',
				)
		));
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Submit',
						'id' => 'submitbutton',
						'class' => "btn blue"
				),
		));
	}
}