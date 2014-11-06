<?php

namespace M2S\Route;

class Router
{
	protected $_routesFile   = null;
	protected $_urlParams    = null;
	protected $_url          = '';
	protected $_numUrlParams = null;
	protected $_routeName    = null;
	protected $_routeMatch   = null;

	function __construct()
	{
		$this->_routesFile = $this->loadRoutesFile();
		$this->_urlParams  = $this->getParamsFromUrl();
		$this->_routeMatch = $this->searchRoute();

		// var_dump($this->_numUrlParams);
		// echo "<pre>" . print_r($this->_routeMatch, 1);
		if ($this->validateRouteParams()) {
			echo "OK";
			echo "<pre>" . print_r($this->_routeMatch, 1);
		} else {
			$this->_routeMatch = $this->_routesFile['_default_'];
			echo "NOPS";
			echo "<pre>" . print_r($this->_routeMatch, 1);
		}
	}

	function getRoute()
	{
	}

	function getParamsFromUrl()
	{
		if (isset($_GET['_route_'])) {
			$this->_url = $_GET['_route_'];
		}

		if (empty($this->_url)) {
			$this->_url = 'index';
		}
		
		$this->_urlParams    = explode('/', $this->_url);
		$this->_numUrlParams = count($this->_urlParams);
		$this->_routeName    = $this->_urlParams[0];

		return $this->_urlParams;
	}

	function searchRoute()
	{
		if (array_key_exists($this->_routeName, $this->_routesFile)) {
			return $this->_routesFile[$this->_routeName];
		}

		return $this->_routesFile['_default_'];
	}

	function validateRouteParams()
	{	
		if ($this->_numUrlParams >= count(explode('/', $this->_routeMatch['route'])) - 1) {

			$validation = true;

			if (preg_match('/(\[:action:])/', $this->_routeMatch['route'])) {
				$_actionPosition = array_search('[:action:]', explode('/', $this->_routeMatch['route'])) - 1;

				preg_match_all('/' . $this->_routeMatch['validations']['[:param:]'] . '/', $this->_urlParams[$_actionPosition], $matches);

				if (empty($matches[0])) {
					$validation = false;
				}
			}

			if (preg_match('/(\[:param:])/', $this->_routeMatch['route'])) {
				$_actionPosition = array_search('[:param:]', explode('/', $this->_routeMatch['route'])) - 1;

				preg_match_all('/' . $this->_routeMatch['validations']['[:param:]'] . '/', $this->_urlParams[$_actionPosition], $matches);

				if (empty($matches[0])) {
					$validation = false;
				}
			}

			return $validation;
		}
	}

	function parseRouteParams()
	{
	}

	/**
	 * loads routes files(Routes.php) from config path
	 * @return array return array with routes configured
	 */
	protected function loadRoutesFile()
	{
		if (file_exists(CONFIG_PATH . DS . 'Routes.php')) {
			return require(CONFIG_PATH . DS . 'Routes.php');
		}

		return require('lib' . DS . 'config' . DS . 'Routes.php');
	}
}