<?php
namespace Product\Form;

use Zend\Form\Form;

class ProductForm extends Form
{
    protected $gatewayTable;

    public function setGatewayTable($gatewayTable){
        $this->gatewayTable = $gatewayTable;
    }
    public function getGatewayTable(){
        return $this->gatewayTable;
    }

    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('product');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add( array(
            'name' => 'item_code',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Item Code',
                'id' => 'item_code',
            )
        ));

        $this->add( array(
            'name' => 'supplier_code',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Supplier Code',
                'id' => 'supplier_code',
            )
        ));

        $this->add( array(
            'name' => 'bl_code',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter bl Code',
                'id' => 'bl_code',
            )
        ));


        $this->add( array(
            'name' => 'bl_code',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter BL Code',
                'id' => 'bl_code',
            )
        ));

        $this->add( array(
            'name' => 'print_code',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Print  Code',
                'id' => 'print_code',
            )
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Product Name',
                'id' => 'name',
            )
        ));

        $this->add(array(
            'name' => 'brand',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Brand',
                'tabindex' => '1',
                'id' => 'brand',
            ),
            'options' => array(
                'value_options' => array(
                    'value_options' => $this->getGatewayTable()['brandTable']->fetchSelectOption(),
                ),
            )
        ));

        $this->add(array(
            'name' => 'category',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Category',
                'tabindex' => '1',
                'id' => 'brand',
            ),
            'options' => array(
                'value_options' => array(
                    'value_options' => $this->getGatewayTable()['categoryTable']->fetchSelectOption(),

                ),
            )
        ));

        $this->add(array(
            'name' => 'subcategory',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Sub Category',
                'tabindex' => '1',
                'id' => 'subcategory',
            ),
            'options' => array(
                'value_options' => array(
                    'value_options' => $this->getGatewayTable()['subcategoryTable']->fetchSelectOption(),
                ),
            )
        ));

        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Description',
                'id' => 'description',
            )
        ));

        $this->add(array(
            'name' => 'uom',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Unit of Measurement',
                'tabindex' => '1',
                'id' => 'uom',
            ),
            'options' => array(
                'value_options' => array(
                    'value_options' => $this->getGatewayTable()['uomTable']->fetchSelectOption(),
                ),
            )
        ));

        $this->add(array(
            'name' => 'color',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Color',
                'id' => 'size',
            )
        ));

        $this->add(array(
            'name' => 'size',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Size',
                'id' => 'size',
            )
        ));

        $this->add(array(
            'name' => 'weight',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Weight',
                'id' => 'weight',
            )
        ));

        $this->add(array(
            'name' => 'supplier',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Supplier',
                'tabindex' => '1',
                'id' => 'supplier',
            ),
            'options' => array(
                'value_options' => array(
                    'value_options' => $this->getGatewayTable()['supplierTable']->fetchSelectOption(),
                ),
            )
        ));

        $this->add(array(
            'name' => 'international_cost',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter International Cost',
                'id' => 'status',
            )
        ));

        $this->add(array(
            'name' => 'purchase_cost',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Purchase Cost',
                'id' => 'status',
            )
        ));

       $this->add(array(
            'name' => 'currency',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Purchase Cost',
                'id' => 'status',
            )
        ));

        $this->add(array(
            'name' => 'status',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Status',
                'id' => 'status',
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submitbutton',
                'class' => "btn blue"
            ),
        ));
    }
}