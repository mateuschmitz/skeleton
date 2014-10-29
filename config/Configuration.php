<?php

namespace Config;

class Configuration
{
	protected $connections;

	function __construct() {
		$this->loadConnectionFile();
		echo "<pre>" . print_r($this->connections, 1);
	}

	protected function loadConnectionFile() {
		$this->connections = require('config' . DS . 'Databases.php');
	}
}