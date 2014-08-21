<?php

namespace Product\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Product
{
	public $id;
	public $code;
	public $name;
	public $brand_id;
	public $model;
	public $description;
	public $size;
	public $weight;
    public $uom;
    public $supplier_id;
	public $status;
    protected $inputFilter;
	
	public function exchangeArray($data){
		$this->id = (!empty($data['id'])) ? $data['id'] : null;
		$this->code = (!empty($data['code'])) ? $data['code'] : null;
		$this->name = (!empty($data['name'])) ? $data['name'] : null;
		$this->brand_id = (!empty($data['brand_id'])) ? $data['brand_id'] : null;
        $this->model = (!empty($data['model'])) ? $data['model'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
		$this->size = (!empty($data['size'])) ? $data['size'] : null;
		$this->weight = (!empty($data['weight'])) ? $data['weight'] : null;
        $this->uom = (!empty($data['uom'])) ? $data['uom'] : null;
        $this->status = (!empty($data['status'])) ? $data['status'] : null;
        $this->supplier_id = (!empty($data['supplier_id'])) ? $data['supplier_id'] : null;
		
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
                'name'     => 'code',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
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


//                $inputFilter->add(array(
//                    'name'     => 'brand_id',
//                    'required' => false,
//                    'filters'  => array(
//                        array('name' => 'Int'),
//                    ),
//                ));



                $inputFilter->add(array(
                    'name'     => 'model',
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
                'name'     => 'description',
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
                            'max'      => 500,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'uom',
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
                       'name'     => 'code',
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
                       'name'     => 'weight',
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


//                    $inputFilter->add(array(
//                        'name'     => 'supplier_id',
//                        'required' => false,
//                        'filters'  => array(
//                            array('name' => 'Int'),
//                        ),
//                    ));
                    $this->inputFilter = $inputFilter;
                }
        return $this->inputFilter;
    }
}
