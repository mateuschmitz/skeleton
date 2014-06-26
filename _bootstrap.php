<?php
 
require('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

define('DS', DIRECTORY_SEPARATOR);

function runApplication()
{
	$url    = $_GET['_route_'];
	$configData = require('config' . DS . 'config.php');

	if (empty($url)) {

		if ($configData[$configData['default']]['active'] == true) {

			$controller = ucfirst($configData[$configData['default']]['module']) . '\Controller\\' . $configData[$configData['default']]['controller'];
			$controller = new $controller;
			$controller->$configData[$configData['default']]['action']();
		
		} else {

			echo 'Erro na configuracao do modulo ' . $configData['default'];

		}
	} else {

		$urlData = explode('/', $url);
		$module  = ucfirst($urlData[0]);

		if (array_key_exists($module, $configData)) {

			if ($configData[$module]['active'] == true) {

				$controller = ucfirst($configData[$module]['module']) . '\Controller\\' . $configData[$module]['controller'];
				$controller = new $controller;
				$controller->$configData[$module]['action']();

			} else {

				echo 'Erro na configuracao do modulo ' . $urlData[0];

			}

		} else {

			exit('404');

		}
	}
}
