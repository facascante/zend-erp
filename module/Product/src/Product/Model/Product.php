<?php

namespace Product\Model;

class Product
{
	public $id;
	public $code;
	public $name;
	public $brand_id;
	public $description;
	public $size;
	public $weight;
	public $suppier_id;
	public $status;
	
	public function exchangeArray($data){
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->code = (!empty($data['code'])) ? $data['code'] : null;
		$this->name = (!empty($data['name'])) ? $data['name'] : null;
		$this->brand_id = (!empty($data['brand_id'])) ? $data['brand_id'] : null;
		$this->description = (!empty($data['description'])) ? $data['description'] : null;
		$this->size = (!empty($data['role_id'])) ? $data['role_id'] : null;
		$this->weight = (!empty($data['weight'])) ? $data['weight'] : null;
		$this->supplier_id = (!empty($data['supplier_id'])) ? $data['supplier_id'] : null;
		$this->status = (!empty($data['status'])) ? $data['status'] : null;
		
	}
}