<?php

namespace Config;

class Configuration
{
	protected $connections;
	protected $connection;

	/**
	 * Construtor da classe
	 * Carrega o arquivo com as configurãções de banco de dados caso ele exista
	 */
	function __construct() {
		$this->loadConnectionFile();
	}

	/**
	 * Recebe o nome da conexão a ser iniciada e caso ela exista, a inicia
	 * @param  string $connectionName nome da conexão a ser iniciada
	 * @return object PDO object 
	 */
	public function beginConnection($connectionName) {
		if (array_key_exists($connectionName, $this->connections)) {

			$this->connection = $this->connections[$connectionName];
			return new \PDO(
				 'mysql:host=' . $this->connection['host'] . ';dbname=' . $this->connection['database'],
				 $this->connection['username'], $this->connection['password']
				);

		}
	}

	/**
	 * Carrega o arquivo Databases.php com as configurações de conexões
	 */
	protected function loadConnectionFile() {
		if (file_exists(require('config' . DS . 'Databases.php'))) {
			$this->connections = require('config' . DS . 'Databases.php');
		}
	}
}