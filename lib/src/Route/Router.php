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
	protected $_route        = null;

	function __construct()
	{
		$this->_routesFile = $this->loadRoutesFile();
	}

	public function getRoute()
	{
		$this->_urlParams  = $this->getParamsFromUrl();
		$this->_routeMatch = $this->searchRoute();

		$this->_route = array(
			'route'          => $this->_url,
			'namespace'      => $this->_routeMatch['constraints']['namespace'],
			'controller'     => $this->_routeMatch['constraints']['controller'],
			);

		if ($this->validateAction()) {
			$this->parseRouteAction();
			$this->_route['action'] = $this->_routeMatch['constraints']['action'];
		} else {
			if (isset($this->_routeMatch['default']['action'])) {
				$this->_route['action'] = $this->_routeMatch['default']['action'];
			}
		}

		if ($this->validateParam()) {
			$this->parseRouteParam();
			if (isset($this->_routeMatch['param']['param'])) {
				$this->_route['param'] = $this->_routeMatch['param']['param'];
			}
		}

		if (isset($this->_routeMatch['default']['action'])) {
			$this->_route['default-action'] = $this->_routeMatch['default']['action'];
		}

		return $this->_route;
	}

	protected function getParamsFromUrl()
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

	protected function searchRoute()
	{
		if (array_key_exists($this->_routeName, $this->_routesFile)) {
			return $this->_routesFile[$this->_routeName];
		}

		return $this->_routesFile['_default_'];
	}

	protected function validateAction()
	{
		$_actionPosition = array_search('[:action:]', explode('/', $this->_routeMatch['route'])) - 1;

		if (preg_match('/(\[:action:])/', $this->_routeMatch['route'])) {
			if (isset($this->_urlParams[$_actionPosition]) && !empty($this->_urlParams[$_actionPosition])) {
				preg_match_all('/' . $this->_routeMatch['validations']['[:action:]'] . '/', $this->_urlParams[$_actionPosition], $matches);
				if (empty($matches[0])) {
					return false;
				}
				return true;
			}
			return false;
		}
		return true;
	}

	protected function validateParam()
	{
		$_paramPosition = array_search('[:param:]', explode('/', $this->_routeMatch['route'])) - 1;

		if (preg_match('/(\[:param:])/', $this->_routeMatch['route'])) {
			if (isset($this->_urlParams[$_paramPosition])  && !empty($this->_urlParams[$_paramPosition])) {
				preg_match_all('/' . $this->_routeMatch['validations']['[:param:]'] . '/', $this->_urlParams[$_paramPosition], $matches);
				if (empty($matches[0])) {
					return false;
				}
				return true;
			}
			return false;
		}
		return true;
	}

	protected function parseRouteAction()
	{
		$_actionPosition = array_search('[:action:]', explode('/', $this->_routeMatch['route'])) - 1;

		if (isset($this->_urlParams[$_actionPosition])) {
			$this->_routeMatch['constraints']['action'] = str_replace('[:action:]', $this->_urlParams[$_actionPosition], $this->_routeMatch['constraints']['action']);
		}
	}

	protected function parseRouteParam()
	{
		$_paramPosition = array_search('[:param:]', explode('/', $this->_routeMatch['route'])) - 1;

		if (isset($this->_urlParams[$_paramPosition])) {
			$this->_routeMatch['param']['param'] = str_replace('[:param:]', $this->_urlParams[$_paramPosition], $this->_routeMatch['param']['param']);
		}
	}

	protected function loadRoutesFile()
	{
		if (file_exists(CONFIG_PATH . DS . 'Routes.php')) {
			return require(CONFIG_PATH . DS . 'Routes.php');
		}

		return require('lib' . DS . 'config' . DS . 'Routes.php');
	}
}
