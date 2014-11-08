<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Controller
 */

namespace M2S\Controller;

use Config\Configuration;

class Controller
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