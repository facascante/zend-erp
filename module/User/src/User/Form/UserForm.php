<?php
namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('user');

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
						'value_options' => array(
							'0' => 'Developer',
							'1' => 'Administrator'
						),
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