<?php

echo "<pre>";
define('DS', DIRECTORY_SEPARATOR);

$url    = $_GET['_route_'];
$configData = require('config' . DS . 'config.php');

if (empty($url)) {
	if ($configData[$configData['default']]['active'] == true) {
		return $configData[$configData['default']];
	} else {
		return 'Erro na configuracao do modulo ' . $configData['default'];
	}
} else {
	$urlData = explode('/', $url);
	$module  = ucfirst($urlData[0]);

	if (array_key_exists($module, $configData)) {
		if ($configData[$module]['active'] == true) {
			return $configData[$module];
		} else {
			return 'Erro na configuracao do modulo ' . $urlData[0];
		}
	} else {
		return '404';
	}
}
