<?php

return array(
	
	'index' => array(
		'route' 	  => '/',
		'type'        => '',
		'constraints' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'IndexController',
			'action'     => 'indexAction'
			)
		),

	'user' => array(
		'route' => '/user/[:username:]',
		'type'  => '',
		'constraints' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'UserController',
			'action'     => 'indexAction'
			),
		'params' => array(
			'numParams' => 1
			)
		),

	'login' => array(
		'route' 	  => '/',
		'type'        => '',
		'constraints' => array(
			'namespace'  => 'Site\Controller\\',
			'controller' => 'IndexController',
			'action'     => 'indexAction'
			)
		),

	);