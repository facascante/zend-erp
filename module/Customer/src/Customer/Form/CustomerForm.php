<?php
namespace Customer\Form;

use Zend\Form\Form;

class CustomerForm extends Form
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
		parent::__construct('customer');
		$this->setGatewayTable($gateway);
		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'category',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_category form-control',
						'data-placeholder' => 'Choose Category',
						'tabindex' => '1',
						'id' => 'category',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['categoryTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'type',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_type form-control',
						'data-placeholder' => 'Choose Type',
						'tabindex' => '1',
						'id' => 'type',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['TypeTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'name',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Company Name',
						'id' => 'name',
				)
		));
		$this->add(array(
				'name' => 'owner',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Owner Name',
						'id' => 'owner',
				)
		));
		$this->add(array(
				'name' => 'trade_name',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Trade Name',
						'id' => 'trade_name',
				)
		));
		$this->add(array(
				'name' => 'consignee',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_type form-control',
						'data-placeholder' => 'Choose Type',
						'tabindex' => '1',
						'id' => 'type',
						
				),
				'options' => array(
						'value_options' => array(
								'1' => 'Yes',
								'2' => 'No'
				))
				
		));
		$this->add(array(
				'name' => 'phone',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Phone Number',
						'id' => 'phone',
				)
		));
		$this->add(array(
				'name' => 'website',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'website',
						'id' => 'website',
				)
		));
		$this->add(array(
				'name' => 'email',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Email Address',
						'id' => 'email',
				)
		));
		$this->add(array(
				'name' => 'tin',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Company TIN',
						'id' => 'tin',
				)
		));
		$this->add(array(
				'name' => 'unpaid_invoice',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Limit of Invoice',
						'id' => 'unpaid_invoice',
				)
		));
		$this->add(array(
				'name' => 'credit_limit',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_type form-control',
						'data-placeholder' => 'Choose',
						'tabindex' => '1',
						'id' => 'credit_limit',
						
				),
				'options' => array(
						'value_options' => array(
								'1' => 'Yes',
								'2' => 'No'
				))
				
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