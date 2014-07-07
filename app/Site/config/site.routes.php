<?php

return array(
	'index' => array(
		'route' => '',
		'constraints' => array(
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
			'namespace'  => 'Site\Controller\\',
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

	'teste'  => array(
		'route' 	  => '/teste/[:action:]/[:param:]',
		'constraints' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'TesteController',
			'action' 	 => '[:action:]Action'
			),
		'validations'    => array(
			'[:action:]' => '([a-zA-Z]*)',
			'[:param:]' => '([0-9]*)'
			),
		'default' => array(
			'action' => 'indexAction'
			),
		'param'      => array(
			'param' => '[:param:]'
			)
		)
	);