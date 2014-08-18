<?php

return array(
    'router' => array(
        'routes' => array(
            'user_index' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/user/user',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'User',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user_add' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/user/user/add',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'User',
                        'action'        => 'add',
                    ),
                ),
            ),
        	'user_edit' => array(
        			'type'    => 'segment',
        			'options' => array(
        					'route'    => '/user/user/edit[/:id]',
        					'defaults' => array(
        							'__NAMESPACE__' => 'User\Controller',
        							'controller'    => 'User',
        							'action'        => 'edit',
        					),
        			),
        	),
        	'user_del' => array(
        			'type'    => 'segment',
        			'options' => array(
        					'route'    => '/user/user/del/:id',
        					'defaults' => array(
        							'__NAMESPACE__' => 'User\Controller',
        							'controller'    => 'User',
        							'action'        => 'del',
        					),
        			),
        	)
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'User\Controller\User' => 'User\Controller\UserController'
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
