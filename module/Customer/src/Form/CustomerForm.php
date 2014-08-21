<?php
namespace Customer\Form;

use Zend\Form\Form;

class CustomerForm extends Form
{
	public function __construct()
	{
		parent::__construct('customer');
		
		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'chito',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'owner Name',
						'id' => 'chito',
				)
		));
		
	}
}