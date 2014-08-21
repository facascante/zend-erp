<?php

namespace Customer\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Customer
{
<<<<<<< HEAD
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
=======
    public $id;
    public $category;
    public $type;
    public $name;
    public $consignee;
//    public $address;
//    public $shippingaddress;
    public $branch;
    public $trade_name;
    public $tin;
    public $phone;
    public $email;
    public $status;
    protected  $inputFilter;


    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->category = (!empty($data['category'])) ? $data['category'] : null;
        $this->type = (!empty($data['type'])) ? $data['type'] : null;
        $this->name= (!empty($data['name'])) ? $data['name'] : null;
        $this->consignee = (!empty($data['consignee'])) ? $data['consignee'] : null;
        $this->branch = (!empty($data['branch'])) ? $data['branch'] : null;
        $this->trade_name = (!empty($data['trade_name'])) ? $data['trade_name'] : null;
        $this->tin = (!empty($data['tin'])) ? $data['tin'] : null;
        $this->phone = (!empty($data['phone'])) ? $data['phone'] : null;
        $this->email = (!empty($data['email'])) ? $data['email'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
    }


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
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));


            $inputFilter->add(array(
                'name'     => 'category',
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
                'name'     => 'type',
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
                'name'     => 'name',
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
                'name'     => 'consignee',
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
                'name'     => 'branch',
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
                            'max'      => 200,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'trade_name',
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
                            'max'      => 75,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'tin',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'phone',
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
                            'max'      => 25,
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
            $inputFilter->add(array(
                'name'     => 'status',
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
>>>>>>> 894633b52a3c520a683fb8632ed126953b7d0f06
}