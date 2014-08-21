<?php
namespace Sales\Form;

use Zend\Form\Form;

class OrderForm extends Form
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
		parent::__construct('order');
		$this->setGatewayTable($gateway);
		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'sono',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'System Generated',
						'id' => 'sono',
						'disabled' => true
				)
		));
		$this->add(array(
				'name' => 'customer',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Choose Customer',
						'tabindex' => '1',
						'id' => 'customer',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'transtype',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Choose Transaction Type',
						'tabindex' => '1',
						'id' => 'transtype',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'shipto',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Ship To',
						'tabindex' => '1',
						'id' => 'shipto',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'billto',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Bill To',
						'tabindex' => '1',
						'id' => 'billto',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'ordersrc',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Order Source',
						'tabindex' => '1',
						'id' => 'ordersrc',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'se',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'SE',
						'tabindex' => '1',
						'id' => 'se',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'sm',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'SM',
						'id' => 'sm',
				)
		));
		$this->add(array(
				'name' => 'terms',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Terms',
						'tabindex' => '1',
						'id' => 'terms',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
				)
		));
		$this->add(array(
				'name' => 'pono',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'PONO',
						'id' => 'pono',
				)
		));
		$this->add(array(
				'name' => 'prefdeldate',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Prefered Delivery Date',
						'id' => 'sm',
				)
		));
		$this->add(array(
				'name' => 'orderedby',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Ordered By',
						'id' => 'orderedby',
				)
		));
		$this->add(array(
				'name' => 'actdeldate',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Actual Delivery Date',
						'id' => 'actdeldate',
				)
		));
		$this->add(array(
				'name' => 'notes',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Notes',
						'id' => 'notes',
				)
		));
		$this->add(array(
				'name' => 'status',
				'type' => 'Select',
				'attributes' => array(
						'class' => 'select_customer form-control',
						'data-placeholder' => 'Status',
						'tabindex' => '1',
						'id' => 'status',
				),
				'options' => array(
						'value_options' => $this->getGatewayTable()['orderTable']->fetchSelectOption(),
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