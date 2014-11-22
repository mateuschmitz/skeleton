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
use M2S\Session\SessionHandler;
use M2S\Request\RequestHandler;

class Controller
{
	/**
	 * Construtor da class
	 * Disponibiliza os objetos de request e session
	 */
	public function __construct()
	{
		$this->session = new SessionHandler;
		$this->request = new RequestHandler;
	}
	
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