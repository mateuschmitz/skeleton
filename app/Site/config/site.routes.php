<?php

return array(
	
	'index' => array(
		'route' 	  => '/',
		'constraints' => array(
			'namespace'  => 'Site\controller\\',
			'controller' => 'IndexController',
			'action'     => 'indexAction'
			),
		'default' => array(
			'namespace'  => 'Site\controller\\',
			'controller' => 'IndexController',
			'action'     => 'indexAction'
			)
		),

	);