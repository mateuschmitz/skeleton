<?php

namespace Site\Controller;

class RouteController
{
	private $_route;
	private $_routesConfig;
	private $_url;
	private $_urlParams;
	private $_params;

	/**
	 * 
	 * 
	 */
	public function __construct()
	{
		$this->_routesConfig = require(CONFIG_PATH . DS . 'site.routes.php');
		$this->_urlParams = $this->getUrlParams($_GET['_route_']);
	}

	/**
	 * 
	 * 
	 */
	public function getRoute()
	{
		if (empty($this->_urlParams[0])) {
			return  $this->_routesConfig['index'];
		}

		if (array_key_exists($this->_urlParams[0], $this->_routesConfig)) {
			
			$this->_route = $this->_routesConfig[$this->_urlParams[0]];

			return $this->_route;
		}

		return false;
	}

	/**
	 * 
	 * 
	 */
	public static function getUrlParams($url = null)
	{
		return explode('/', $url);
	}

	/**
	 * 
	 * 
	 */
	public static function redirectToRoute($_route)
	{
		$this->_route = $_route;

		if (array_key_exists($this->_route, $this->_routesConfig)) {
			return  $this->_routesConfig[$this->_route];
		}

		return false;
	}
}