<?php

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
			'type' => 'regex',
			'[:action:]' => '([a-zA-Z]*)'
			),
		'default' => array(
			'action' => 'indexAction'
			),
		''
		)

	);