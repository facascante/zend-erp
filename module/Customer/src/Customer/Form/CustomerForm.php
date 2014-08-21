<?php
namespace Customer\Form;

use Zend\Form\Form;

class CustomerForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('customer');

		$this->add(array(
				'name' => 'id',
				'type' => 'Hidden',
		));


        $this->add(array(
            'name' => 'category',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Category',
                'tabindex' => '1',
                'id' => 'category',
            ),
            'options' => array(
                'value_options' => array(
                    '1' => 'Chito Beauty Products',
                    '2' => 'Chito Salon'
                ),
            )
        ));


        $this->add(array(
            'name' => 'type',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Type',
                'tabindex' => '1',
                'id' => 'type',
            ),
            'options' => array(
                'value_options' => array(
                    '1' => 'Suki',
                    '2' => 'First Timer'
                ),
            )
        ));


		$this->add(array(
				'name' => 'name',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter Customer\'s Name',
						'id' => 'name',
				)
		));


		$this->add(array(
				'name' => 'consignee',
				'type' => 'Text',
				'attributes' => array(
						'class' => 'form-control',
						'placeholder' => 'Enter  Consignee',
						'id' => 'description',
				)
		));

//        $this->add(array(
//            'name' => 'address',
//            'type' => 'Text',
//            'attributes' => array(
//                'class' => 'form-control',
//                'placeholder' => 'Enter Branch',
//                'id' => 'size',
//            )
//        ));


        $this->add(array(
            'name' => 'branch',
            'type' => 'Select',
            'attributes' => array(
                'class' => 'select_role form-control',
                'data-placeholder' => 'Choose a Branch',
                'tabindex' => '1',
                'id' => 'branch',
            ),
            'options' => array(
                'value_options' => array(
                    '1' => 'Tutuban',
                    '2' => 'Divisoria'
                ),
            )
        ));

        $this->add(array(
            'name' => 'trade_name',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Trade Name',
                'id' => 'trade-name',
            )
        ));

        $this->add(array(
            'name' => 'tin',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Customer\'s Tax Identification Number',
                'id' => 'tin',
            )
        ));

        $this->add(array(
            'name' => 'phone',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Customer\'s Phone Number',
                'id' => 'phone',
            )
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Customer\'s Email Address',
                'id' => 'email',
            )
        ));



        $this->add(array(
            'name' => 'status',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter Customer\'s Status',
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