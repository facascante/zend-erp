<?php

return array(
    'router' => array(
        'routes' => array(
            'order_index' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/sales/order',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Sales\Controller',
                        'controller'    => 'Order',
                        'action'     => 'index',
                    ),
                ),
            ),
            'order_add' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/sales/order/add',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Sales\Controller',
                        'controller'    => 'Order',
                        'action'        => 'add',
                    ),
                ),
            ),
        	'order_edit' => array(
        			'type'    => 'segment',
        			'options' => array(
        					'route'    => '/sales/order/edit[/:id]',
        					'defaults' => array(
        							'__NAMESPACE__' => 'Sales\Controller',
        							'controller'    => 'Order',
        							'action'        => 'edit',
        					),
        			),
        	),
        	'order_del' => array(
        			'type'    => 'segment',
        			'options' => array(
        					'route'    => '/sales/order/del/:id',
        					'defaults' => array(
        							'__NAMESPACE__' => 'Sales\Controller',
        							'controller'    => 'Order',
        							'action'        => 'del',
        					),
        			),
        	)
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Sales\Controller\Order' => 'Sales\Controller\OrderController'
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
