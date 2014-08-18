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
				'options' => array(
						'label' => 'Firstname',
				),
		));
		$this->add(array(
				'name' => 'mname',
				'type' => 'Text',
				'options' => array(
						'label' => 'Middlename',
				),
		));
		$this->add(array(
				'name' => 'lname',
				'type' => 'Text',
				'options' => array(
						'label' => 'Lastname',
				),
		));
		$this->add(array(
				'name' => 'email',
				'type' => 'Text',
				'options' => array(
						'label' => 'Email',
				),
		));
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Submit',
						'id' => 'submitbutton',
				),
		));
	}
}