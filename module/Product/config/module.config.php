<?php

return array(
    'router' => array(
        'routes' => array(
            'user_index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/product/product',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Product\Controller',
                        'controller'    => 'Product',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user_add' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/product/product/add',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Product\Controller',
                        'controller'    => 'Product',
                        'action'        => 'add',
                    ),
                ),
            ),
        	'user_edit' => array(
        			'type'    => 'segment',
        			'options' => array(
        					'route'    => '/product/product/edit[/:id]',
        					'defaults' => array(
        							'__NAMESPACE__' => 'Product\Controller',
        							'controller'    => 'Product',
        							'action'        => 'edit',
        					),
        			),
        	),
        	'user_del' => array(
        			'type'    => 'segment',
        			'options' => array(
        					'route'    => '/product/product/del/:id',
        					'defaults' => array(
        							'__NAMESPACE__' => 'Product\Controller',
        							'controller'    => 'Product',
        							'action'        => 'del',
        					),
        			),
        	)
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'User\Controller\User' => 'Product\Controller\ProductController'
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
