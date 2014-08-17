<?php

namespace User\Model;

class User
{
	public $id;
	public $fname;
	public $mname;
	public $lname;
	public $email;
	public $role_id;
	public $key;
	public $secret;
	
	public function exchangeArray($data){
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->fname = (!empty($data['fname'])) ? $data['fname'] : null;
		$this->mname = (!empty($data['mname'])) ? $data['mname'] : null;
		$this->lname = (!empty($data['lname'])) ? $data['lname'] : null;
		$this->email = (!empty($data['email'])) ? $data['email'] : null;
		$this->role_id = (!empty($data['role_id'])) ? $data['role_id'] : null;
		$this->key = (!empty($data['key'])) ? $data['key'] : null;
		$this->secret = (!empty($data['secret'])) ? $data['secret'] : null;
		
	}
}