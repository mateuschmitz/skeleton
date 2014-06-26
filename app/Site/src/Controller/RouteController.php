<?php

namespace Site\Controller;

class RouteController
{
	private $_route;
	private $_routesConfig;
	private $_url;
	private $_urlParams;

	/**
	 * 
	 * 
	 */
	public function getRoute()
	{
		$this->_routesConfig = require(CONFIG_PATH . DS . 'site.routes.php');
		$this->_urlParams = $this->getUrlParams($_GET['_route_']);

		if (empty($this->_urlParams[0])) {
			return  $this->_routesConfig['index'];
		}

		if (array_key_exists($this->_urlParams[0], $this->_routesConfig)) {
			return  $this->_routesConfig[$this->_urlParams[0]];
		}

		return 'Erro: 404';
	}

	/**
	 * 
	 * 
	 */
	private function getUrlParams($url = null)
	{
		return explode('/', $url);
	}

}