<?php

namespace User\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

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
	protected $inputFilter;
	
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
	// Add content to these methods:
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
	
			$inputFilter->add(array(
					'name'     => 'id',
					'required' => true,
					'filters'  => array(
							array('name' => 'Int'),
					),
			));
	
			$inputFilter->add(array(
					'name'     => 'fname',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 50,
									),
							),
					),
			));
			$inputFilter->add(array(
					'name'     => 'mname',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 50,
									),
							),
					),
			));
			$inputFilter->add(array(
					'name'     => 'lname',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 50,
									),
							),
					),
			));
			$inputFilter->add(array(
					'name'     => 'email',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 50,
									),
							),
					),
			));
			$this->inputFilter = $inputFilter;
		}
	
		return $this->inputFilter;
	}
}