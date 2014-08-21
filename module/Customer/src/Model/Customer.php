<?php

namespace Customer\Model;

class Customer
{
	public $id;
	public $category;
	public $type;
	public $name;
	public $trade_name;
	public $consignee;
	public $phone;
	public $email;
	public $owner;
	public $contact_person;
	public $tin;
	public $website;
	public $shipping_mode;
	public $payment_terms;
	public $unpaid_invoice;
	public $credit_limit;
	public $billing_address_id;
	public $shipping_address_id;
	public $sales_executive;
	public $status;
	
	public function exchangeArray($data){
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->category = (!empty($data['category'])) ? $data['category'] : null;
		$this->type = (!empty($data['type'])) ? $data['type'] : null;
		$this->name= (!empty($data['name'])) ? $data['name'] : null;
		$this->trade_name = (!empty($data['trade_name'])) ? $data['trade_name'] : null;
		$this->consignee = (!empty($data['consignee'])) ? $data['consignee'] : null;
		$this->phone = (!empty($data['phone'])) ? $data['phone'] : null;
		$this->email = (!empty($data['email'])) ? $data['email'] : null;
		$this->owner = (!empty($data['owner'])) ? $data['owner'] : null;
		$this->contact_person = (!empty($data['contact_person'])) ? $data['contact_person'] : null;
		$this->website = (!empty($data['website'])) ? $data['website'] : null;
		$this->shipping_mode = (!empty($data['shipping_mode'])) ? $data['shipping_mode'] : null;
		$this->payment_terms = (!empty($data['payment_terms'])) ? $data['payment_terms'] : null;
		$this->unpaid_invoice = (!empty($data['unpaid_invoice'])) ? $data['unpaid_invoice'] : null;
		$this->credit_limit = (!empty($data['credit_limit'])) ? $data['credit_limit'] : null;
		$this->billing_address_id = (!empty($data['billing_address_id'])) ? $data['billing_address_id'] : null;
		$this->shipping_address_id = (!empty($data['shipping_address_id'])) ? $data['shipping_address_id'] : null;
		$this->sales_executive = (!empty($data['sales_executive'])) ? $data['sales_executive'] : null;
		$this->status = (!empty($data['status'])) ? $data['status'] : null;
		
	}
}