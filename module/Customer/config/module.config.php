<?php

return array(
    'router' => array(
        'routes' => array(
            'customer_index' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/customer/customer',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Customer\Controller',
                        'controller'    => 'Customer',
                        'action'     => 'index',
                    ),
                ),
            ),
            'customer_add' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/customer/customer/add',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Customer\Controller',
                        'controller'    => 'Customer',
                        'action'        => 'add',
                    ),
                ),
            ),
            'customer_edit' => array(
                    'type'    => 'segment',
                    'options' => array(
                            'route'    => '/customer/customer/edit[/:id]',
                            'defaults' => array(
                                    '__NAMESPACE__' => 'Customer\Controller',
                                    'controller'    => 'Customer',
                                    'action'        => 'edit',
                            ),
                    ),
            ),
            'customer_del' => array(
                    'type'    => 'segment',
                    'options' => array(
                            'route'    => '/customer/customer/del/:id',
                            'defaults' => array(
                                    '__NAMESPACE__' => 'Customer\Controller',
                                    'controller'    => 'Customer',
                                    'action'        => 'del',
                            ),
                    ),
            )
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Customer\Controller\Customer' => 'Customer\Controller\CustomerController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )
);
