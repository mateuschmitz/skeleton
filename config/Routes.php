<?php

return array(
	'index' => array(
		'route' => '',
		'constraints' => array(
			'namespace'  => 'App\Controller\\',
			'controller' => 'IndexController',
			'action' 	 => 'indexAction'
			)
		),

	'_default_' => array(
		'route' 	  => '/[:param:]',
		'constraints' => array(
			'namespace'  => 'App\Controller\\',
			'controller' => 'UserController',
			'action' 	 => 'indexAction'
			),
		'validations' => array(
			'[:param:]' => '([a-zA-Z]*)'
			),
		'param'      => array(
			'param' => '[:param:]'
			)
		),

	'user'  => array(
		'route' 	  => '/user/[:action:]',
		'constraints' => array(
			'namespace'  => 'App\Controller\\',
			'controller' => 'UserController',
			'action' 	 => '[:action:]Action'
			),
		'validations'    => array(
			'[:action:]' => '([a-zA-Z]*)'
			),
		'default' => array(
			'action' => 'indexAction'
			)
		),
	);