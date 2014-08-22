<?php

namespace Sales\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Order
{
	public $id;
	public $sono;
	public $customer;
	public $transtype;
	public $shipto;
	public $billto;
	public $ordersrc;
	public $se;
	public $sm;
	public $terms;
	public $pono;
	public $prefdeldate;
	public $orderedby;
	public $actdeldate;
	public $notes;
	public $status;
    protected $inputFilter;

    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->sono = (!empty($data['sono'])) ? $data['sono'] : null;
        $this->customer = (!empty($data['customer'])) ? $data['customer'] : null;
        $this->transtype = (!empty($data['transtype'])) ? $data['transtype'] : null;
        $this->shipto = (!empty($data['shipto'])) ? $data['shipto'] : null;
        $this->billto = (!empty($data['billto'])) ? $data['billto'] : null;
        $this->ordersrc = (!empty($data['ordersrc'])) ? $data['ordersrc'] : null;
        $this->se = (!empty($data['se'])) ? $data['se'] : null;
        $this->sm = (!empty($data['sm'])) ? $data['sm'] : null;
        $this->terms = (!empty($data['terms'])) ? $data['terms'] : null;
        $this->pono = (!empty($data['pono'])) ? $data['pono'] : null;
        $this->prefdeldate = (!empty($data['prefdeldate'])) ? $data['prefdeldate'] : null;
        $this->orderedby = (!empty($data['orderedby'])) ? $data['orderedby'] : null;
        $this->actdeldate = (!empty($data['actdeldate'])) ? $data['actdeldate'] : null;
        $this->notes = (!empty($data['notes'])) ? $data['notes'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
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
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
            		'name'     => 'sono',
            		'required' => false,
            		'filters'  => array(
            			 array('name' => 'StripTags'),
                    	 array('name' => 'StringTrim'),
            		),
            ));
            $inputFilter->add(array(
                'name'     => 'customer',
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
                            'max'      => 100,
                        ),
                    ),
                ),
            ));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}