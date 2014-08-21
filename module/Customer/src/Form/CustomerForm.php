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
						'value_options' => $this->getGatewayTable()['typeTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'name',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Customer Name',
						'id' => 'name',
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
						'class' => 'select_consignee form-control',
						'data-placeholder' => 'Choose Consignee',
						'tabindex' => '1',
						'id' => 'consignee',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['consigneeTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'phone',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Phone',
						'id' => 'phone',
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
				'name' => 'owner',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Owner Name',
						'id' => 'owner',
				)
		));
		$this->add(array(
				'name' => 'contact_person',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Contact Person',
						'id' => 'contact_person',
				)
		));
		$this->add(array(
				'name' => 'tin',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Customer TIN',
						'id' => 'tin',
				)		
		));
		$this->add(array(
				'name' => 'website',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Website',
						'id' => 'website',
				)
		));
		$this->add(array(
				'name' => 'payment_terms',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_payment_terms form-control',
						'data-placeholder' => 'Choose Payment Terms',
						'tabindex' => '1',
						'id' => 'payment_terms',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['consigneeTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'unpaid_invoice',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter No. of Unpaid Invoice',
						'id' => 'unpaid_invoice',
				)
		));
		$this->add(array(
				'name' => 'payment_terms',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_payment_terms form-control',
						'data-placeholder' => 'Choose Payment Terms',
						'tabindex' => '1',
						'id' => 'payment_terms',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['payment_termTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'shipping_mode',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_shipping_mode form-control',
						'data-placeholder' => 'Choose Shipping Mode',
						'tabindex' => '1',
						'id' => 'shipping_mode',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['shipping_modeTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'status',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_status form-control',
						'data-placeholder' => 'Choose Status',
						'tabindex' => '1',
						'id' => 'status',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['statusTable']->fetchSelectOption(),
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