<?php

return array(
	
	'default' => 'Site',

	'Site' => array(
		'module' 	  => 'site',
		'active' 	  => true,
		'controller'  => 'FrontController',
		'action'	  => 'indexAction'
		),
	
	'Api'  => array(
		'module' 	  => 'api',
		'active' 	  => false,
		'controller'  => 'FrontController',
		'action'	  => 'indexAction'
		)
	
	);