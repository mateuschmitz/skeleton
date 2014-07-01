<?php

/**
 * [:controller:]
 * [:action:]
 * [:param:]
 *
 * array(
 *		'namespace'
 *		'controller'
 *		'action'
 *		'params'
 *		)
 */

return array(

	'index' => array(
		'route' => '',
		'default' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'IndexController',
			'action' 	 => 'indexAction'
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
			'[:param:]' => '([a-zA-Z]*)'
			),
		'default' => array(
			'action' => 'indexAction'
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
			'type' => '',
			'[:action:]' => '([a-zA-Z]*)'
			),
		'default' => array(
			'action' => 'indexAction'
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