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
			'controller' => 'IndexController',
			'action' 	 => 'indexAction'
			),
		'validations' => array(
			'[:param:]' => '([a-zA-Z]*)'
			),
		'param'      => array(
			'param' => '[:param:]'
			)
		),
	);