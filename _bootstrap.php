<?php
echo "<pre>";
define('DS', DIRECTORY_SEPARATOR);

$url    = $_GET['_route_'];
$configData = require('config' . DS . 'config.php');

if (empty($url)) {
	if ($configData[$configData['default']]['active'] == true) {
		$moduleData = $configData[$configData['default']];
	} else {
		echo 'Erro na configuracao do modulo ' . $configData['default'];
	}
} else {
	$urlData = explode('/', $url);
	$module  = ucfirst($urlData[0]);

	if (array_key_exists($module, $configData)) {
		if ($configData[$module]['active'] == true) {
			$moduleData = $configData[$module];
		} else {
			echo 'Erro na configuracao do modulo ' . $urlData[0];
		}
	} else {
		echo '404';
	}
}
print_r($moduleData);