<?php

namespace App\Controller;

use Config\Configuration;

class BaseController
{
	/**
	 * Retorna a conexão solicitada
	 * @param  string $connectionName Nome da conexão a ser iniciada
	 * @return object PDO object
	 */
	public function getConnection($connectionName = null) {
		$config = new Configuration;
		$connection = (is_null($connectionName)) ? $config->beginConnection('teste') :
									$connection = $config->beginConnection($connectionName);

		return $connection;
	}
}