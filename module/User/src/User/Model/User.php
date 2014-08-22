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
    public $role;
    public $key;
    public $secret;
    public $status;
    protected $inputFilter;

    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->fname = (!empty($data['fname'])) ? $data['fname'] : null;
        $this->mname = (!empty($data['mname'])) ? $data['mname'] : null;
        $this->lname = (!empty($data['lname'])) ? $data['lname'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->role = (!empty($data['role'])) ? $data['role'] : null;
        $this->username = (!empty($data['username'])) ? $data['username'] : null;
        $this->secret = (!empty($data['secret'])) ? $data['secret'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;

    }
    // Add the following method:
    public function getArrayCopy()
    {
    	return get_object_vars($this);
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

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}