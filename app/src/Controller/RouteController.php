<?php

/**
 * NÃO APAGUE ESTE ARQUIVO
 * Ele controla todas as rotas do sistema
 */

namespace App\Controller;

class RouteController
{
	private $_routesConfig;
	private $_url;
	private $_urlParams;
	private $_routeName;
	private $_routeMatch;
	private $_keyRouteAction;
	private $_keyRouteParam;
	private $_route;

	function __construct()
	{
		$this->_url          = isset($_GET['_route_']) ? $_GET['_route_'] : null;
		$this->_urlParams    = $this->getParamsFromUrl();
	}

	/**
	 * Retorna a rota a ser utilizada, caso a mesma seja encontrada
	 * 
	 * @return array
	 */
	public function getRoute()
	{
		$this->_routeMatch = $this->searchRoute($this->_urlParams[0]);

		if ($this->validateRouteElements($this->_routeMatch)) {
			$this->_route = $this->parseRouteParams($this->_routeMatch);
		}

		return $this->_route;
	}

	/**
	 * Retorna array com a url acessada
	 * 
	 * @return array 
	 */
	private function getParamsFromUrl()
	{
		return explode('/', $this->_url);
	}

	/**
	 * Procura a rota acessada e a retorna, caso encontrada
	 * 
	 * @return array
	 */
	private function searchRoute($_routeName = null)
	{
		$this->_routesConfig = require(CONFIG_PATH . DS . 'Routes.php');
		$this->_routeName    = $_routeName;

		if (empty($this->_routeName)) {
			return $this->_routesConfig['index'];
		}

		if (array_key_exists($this->_routeName, $this->_routesConfig)) {
			return $this->_routesConfig[$this->_routeName];
		}

		return $this->_routesConfig['_default_'];
	}

	/**
	 * Valida se a rota acessada atende aos parâmetros da rota definida
	 * 
	 * @return bool
	 */
	private function validateRouteElements($_routeMatch = array())
	{
		if (preg_match('/(\[:action:])/', $_routeMatch['route'])) {
			
			if (count($this->_urlParams) > 1) {
				$this->_keyRouteAction = array_search('[:action:]', explode('/', $_routeMatch['route'])) - 1;
			} else {
				$this->_keyRouteAction = array_search('[:action:]', explode('/', $_routeMatch['route'])) - 2;
			}

			preg_match('/' . $_routeMatch['validations']['[:action:]'] . '/', $this->_urlParams[$this->_keyRouteAction], $matches);

			if (!$matches[0]) {
				return false;
			}
		}

		if (preg_match('/(\[:param:])/', $_routeMatch['route'])) {
			
			if (count($this->_urlParams) > 1) {
				$this->_keyRouteParam = array_search('[:param:]', explode('/', $_routeMatch['route'])) - 1;
			} else {
				$this->_keyRouteParam = array_search('[:param:]', explode('/', $_routeMatch['route'])) - 2;
			}

			preg_match('/' . $_routeMatch['validations']['[:param:]'] . '/', $this->_urlParams[$this->_keyRouteParam], $matches);

			if (!$matches[0]) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Define a action e os parâmetros que serão utilizados no Front
	 * 
	 * @return array
	 */
	private function parseRouteParams($_routeMatch = array())
	{
		if (preg_match('/(\[:action:])/', $_routeMatch['route'])) {
			$_routeMatch['constraints']['action'] = str_replace('[:action:]', $this->_urlParams[$this->_keyRouteAction], $_routeMatch['constraints']['action']);
		}

		if (preg_match('/(\[:param:])/', $_routeMatch['route'])) {
			$_routeMatch['param']['param'] = str_replace('[:param:]', $this->_urlParams[$this->_keyRouteParam], $_routeMatch['param']['param']);
		}

		return $_routeMatch;
	}
}