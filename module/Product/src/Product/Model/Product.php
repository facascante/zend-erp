<?php

namespace Product\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Product
{
    public $id;
    public $item_code;
    public $supplier_code;
    public $bl_code;
    public $print_code;
    public $name;
    public $brand;
    public $category;
    public $subcategory;
    public $description;
    public $uom;
    public $color;
    public $size;
    public $weight;
    public $supplier;
    public $international_cost;
    public $purchase_cost;
    public $currency;
    public $status;
    protected $inputFilter;


    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->item_code = (!empty($data['item_code'])) ? $data['item_code'] : null;
        $this->supplier_code = (!empty($data['supplier_code'])) ? $data['supplier_code'] : null;
        $this->bl_code = (!empty($data['bl_code'])) ? $data['bl_code'] : null;
        $this->print_code = (!empty($data['print_code'])) ? $data['print_code'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->brand = (!empty($data['brand'])) ? $data['brand'] : null;
        $this->category = (!empty($data['category'])) ? $data['category'] : null;
        $this->subcategory = (!empty($data['subcategory'])) ? $data['subcategory'] : null;
        $this->description = (!empty($data['description'])) ? $data['description'] : null;
        $this->uom = (!empty($data['uom'])) ? $data['uom'] : null;
        $this->color = (!empty($data['color'])) ? $data['color'] : null;
        $this->size = (!empty($data['size'])) ? $data['size'] : null;
        $this->weight = (!empty($data['weight'])) ? $data['weight'] : null;
        $this->supplier = (!empty($data['supplier'])) ? $data['supplier'] : null;
        $this->international_cost = (!empty($data['international_cost'])) ? $data['international_cost'] : null;
        $this->purchase_cost = (!empty($data['purchase_cost'])) ? $data['purchase_cost'] : null;
        $this->currency = (!empty($data['currency'])) ? $data['currency'] : null;
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
                'name'     => 'item_code',
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
                            'max'      => 11,
                        ),
                    ),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'supplier_code',
                'required' => false,
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


            $inputFilter->add(array(
                'name'     => 'bl_code',
                'required' => false,
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

            $inputFilter->add(array(
                'name'     => 'print_code',
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
                'name'     => 'brand',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'category',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'subcategory',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
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
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'color',
                'required' => false,
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

            $inputFilter->add(array(
                'name'     => 'size',
                'required' => false,
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

            $inputFilter->add(array(
                'name'     => 'weight',
                'required' => false,
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

            $inputFilter->add(array(
                'name'     => 'supplier',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'uom',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'international_cost',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));

            $inputFilter->add(array(
                'name'     => 'purchase_cost',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));
            
            $inputFilter->add(array(
                'name'     => 'currency',
                'required' => false,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ));      

            

           $inputFilter->add(array(
                       'name'     => 'status',
                       'required' => false,
                       'filters'  => array(
                           array('name' => 'Int'),
                       ),
                   ));
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}
