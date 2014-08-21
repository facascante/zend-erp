<?php

namespace Customer\Model;

class Customer
{
	public $id;
	public $category_id;
	public $type_id;
	public $owner_name;
	public $company_name;
	public $consignee;
	public $branch;
	public $trade_name;
	public $tin;
	public $phone;
	public $email;
	public $assigned_se;
	public $status;
	
	public function exchangeArray($data){
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->category_id = (!empty($data['category_id'])) ? $data['category_id'] : null;
		$this->type_id = (!empty($data['type_id'])) ? $data['type_id'] : null;
		$this->company_name= (!empty($data['company_name'])) ? $data['company_name'] : null;
		$this->consignee = (!empty($data['consignee'])) ? $data['consignee'] : null;
		$this->branch = (!empty($data['branch'])) ? $data['branch'] : null;
		$this->trade_name = (!empty($data['trade_name'])) ? $data['trade_name'] : null;
		$this->tin = (!empty($data['tin'])) ? $data['tin'] : null;
		$this->phone = (!empty($data['phone'])) ? $data['phone'] : null;
		$this->email = (!empty($data['email'])) ? $data['email'] : null;
		$this->assigned_se = (!empty($data['assigned_se'])) ? $data['assigned_se'] : null;
		$this->status = (!empty($data['status'])) ? $data['status'] : null;
		
	}
}