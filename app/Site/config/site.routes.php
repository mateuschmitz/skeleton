<?php

return array(

	'index' => array(
		'defaults' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'IndexController',
			'action' 	 => 'indexAction'
			)
		),
	
	'user'  => array(
		'route' 	  => '/user/[:action:]',
		'constraints' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'UserController',
			'action' 	 => '[:action:]Action'
			),
		'validations'    => array(
			'[:action:]' => '[a-zA-Z]'
			)
		),

	'_default_' => array(
		'route' 	  => '/[:param:]',
		'constraints' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'UserController',
			'action' 	 => 'indexAction'
			),
		'validations'    => array(
			'[:param:]' => '[a-zA-Z]'
			)

		)



	// 'index' => array(
	// 	'route' 	  => '/',
	// 	'type'        => '',
	// 	'constraints' => array(
	// 		'namespace'  => 'Site\Controller\\',
	// 		'controller' => 'IndexController',
	// 		'action'     => 'indexAction'
	// 		)
	// 	),

	// 'user' => array(
	// 	'route'		  => '/user/[:username:]',
	// 	'type'  	  => '',
	// 	'constraints' => array(
	// 		'namespace'  => 'Site\Controller\\',
	// 		'controller' => 'UserController',
	// 		'action'     => '[a-zA-Z]'
	// 		),
	// 	'defaults'    => array(
	// 		'action'     => 'indexAction'
	// 		),
	// 	'params' 	  => array(
	// 		'numParams' => 1
	// 		)
	// 	),

	);