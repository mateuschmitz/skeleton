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

	'forum'  => array(
  		'route'     => '/forum/[:action:]/[:param:]',
  		'constraints' => array(
    	'namespace'  => 'App\Controller\\',
    	'controller' => 'ForumController',
    	'action'   => '[:action:]Action'
  		),
  	'validations'    => array(
    	'[:action:]' => '^[a-zA-Z]*$',
    	'[:param:]' => '^[a-zA-Z]*$'
  		),
  	'default' => array(
    	'action' => 'indexAction'
  		),
  	'param'      => array(
    	'param' => '[:param:]'
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
			'[:param:]' => '^[a-zA-Z]*$'
			),
		'param'      => array(
			'param' => '[:param:]'
			)
		),
	);