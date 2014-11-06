<?php

//general definitions
define('DS', DIRECTORY_SEPARATOR);

// paths file
$paths = require('config' . DS . 'paths.php');

//define system paths
foreach ($paths as $key => $value) {
	define($key, $value);
}
