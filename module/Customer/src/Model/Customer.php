<?php

namespace Customer\Model;

class Customer
{
	public $id;
	public $customer_category;
	public $customer_type;
	public $customer_name;
	public $customer_consignee;
	public $customer_branch;
	public $customer_trade_name;
	public $customer_tin;
	public $customer_phone;
	public $customer_email;
	public $status;
	
	public function exchangeArray($data){
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->customer_category = (!empty($data['customer_category'])) ? $data['customer_category'] : null;
		$this->customer_type = (!empty($data['customer_type'])) ? $data['customer_type'] : null;
		$this->customer_name= (!empty($data['customer_name'])) ? $data['customer_name'] : null;
		$this->customer_consignee = (!empty($data['customer_consignee'])) ? $data['customer_consignee'] : null;
		$this->customer_branch = (!empty($data['customer_branch'])) ? $data['customer_branch'] : null;
		$this->customer_trade_name = (!empty($data['customer_trade_name'])) ? $data['customer_trade_name'] : null;
		$this->customer_tin = (!empty($data['customer_tin'])) ? $data['customer_tin'] : null;
		$this->customer_phone = (!empty($data['customer_phone'])) ? $data['customer_phone'] : null;
		$this->customer_email = (!empty($data['customer_email'])) ? $data['customer_email'] : null;
		$this->status = (!empty($data['status'])) ? $data['status'] : null;
		
	}
}