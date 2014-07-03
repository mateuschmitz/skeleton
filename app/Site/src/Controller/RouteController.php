<?php

namespace Site\Controller;

class RouteController
{
	private $_routesConfig;
	private $_url;
	private $_urlParams;
	private $_route;
	private $_keyRouteAction;
	private $_keyRouteParam;

	/**
	 *
	 */
	public function __construct()
	{
		$this->_routesConfig = require(CONFIG_PATH . DS . 'site.routes.php');
		$this->_url          = $_GET['_route_'];
		$this->_urlParams    = $this->getUrlParams($this->_url);
	}

	/**
	 *
	 */
	public function getRoute()
	{
		$this->_route = $this->parseRoute();

		return array(
			'route'		 => $this->_route['route'],
			'namespace'	 => $this->_route['constraints']['namespace'],
			'controller' => $this->_route['constraints']['controller'],
			'action'	 => $this->_route['constraints']['action'],
			'default'	 => $this->_route['default']
			);
	}

	/**
	 *
	 */
	private function parseRoute()
	{
		$this->_route = $this->searchRoute();

		if (preg_match('/(\[:action:])/', $this->_route['route'])) {

			$this->_keyRouteAction = array_search('[:action:]', explode('/', $this->_route['route'])) - 1;
			preg_match('/' . $this->_route['validations']['[:action:]'] . '/', $this->_urlParams[$this->_keyRouteAction], $matches);

			if ($matches[0]) {
				$this->_route['constraints']['action'] = str_replace('[:action:]', $matches[0], $this->_route['constraints']['action']);
			}

		}

		if (preg_match('/(\[:param:])/', $this->_route['route'])) {

			$this->_keyRouteParam = array_search('[:param:]', explode('/', $this->_route['route'])) - 1;
			preg_match('/' . $this->_route['validations']['[:param:]'] . '/', $this->_urlParams[$this->_keyRouteParam], $matches);

		}

		return $this->_route;
	}

	/**
	 *
	 */
	private function searchRoute()
	{
		if (empty($this->_urlParams[0])) {
			return  $this->_routesConfig['index'];
		}

		if (array_key_exists($this->_urlParams[0], $this->_routesConfig)) {
			return  $this->_routesConfig[$this->_urlParams[0]];
		}

		return  $this->_routesConfig['_default_'];
	}

	/**
	 *
	 */
	private function getUrlParams()
	{
		return explode('/', $this->_url);
	}

}