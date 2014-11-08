<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Route
 */

namespace M2S\Route;

/**
 * Classe responsável por validar as rotas conforme o definido em 'Routes.php'
 */
class Router
{
	
	/**
	 * Todas as rotas definidas em 'Routes.php'
	 * @var array
	 */
	protected $_routesFile   = array();
	
	/**
	 * Array com a URL acessada
	 * @var array
	 */
	protected $_urlParams    = array();
	
	/**
	 * URL acessada
	 * @var string
	 */
	protected $_url          = null;
	
	/**
	 * Número de parâmetros informados na URL
	 * @var integer
	 */
	protected $_numUrlParams = null;
	
	/**
	 * Nome da rota acessada
	 * @var string
	 */
	protected $_routeName    = null;
	
	/**
	 * Rota encontrada no array de rotas configuradas
	 * @var array
	 */
	protected $_routeMatch   = array();
	
	/**
	 * Rota já tratada e com os parâmetros definidos
	 * @var array
	 */
	protected $_route        = array();

	/**
	 * Construtor da classe
	 */
	public function __construct()
	{
		$this->_routesFile = $this->loadRoutesFile();
	}

	/**
	 * Pega os parâmetros da URL por meio dõ método getParamsFromUrl(). Pega a rota
	 * correspondente através do método searchRoute(). Seta a variável _route.
	 * Faz as validações de action e param retornando _route
	 * 
	 * @return array retorna array com os parâmetros da rota
	 */
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

	/**
	 * Pega os parâmetros da URL acessada. Caso a URL seja vazia atribui 'index' a ela.
	 * Conta o número de parâmetros da URL e atribui a variável _numUrlParams. Seta a variável
	 * _routeName;
	 * 
	 * @return array retorna array com os parâmetros da url
	 */
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

	/**
	 * Verifica se existe uma rota com o mesmo nome do primeiro parâmetro da URL.
	 * Caso não exista retorna a rota _default_
	 * 
	 * @return array retorna array com os parâmetros da rota
	 */
	protected function searchRoute()
	{
		if (array_key_exists($this->_routeName, $this->_routesFile)) {
			return $this->_routesFile[$this->_routeName];
		}

		return $this->_routesFile['_default_'];
	}

	/**
	 * Valida a action da rota, caso exista, com as validações informadas no arquivo de rotas.
	 * 
	 * @return boolean Retorna true caso a action esteja correta ou false caso contrário
	 */
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

	/**
	 * Valida o param da rota, caso exista, com as validações informadas no arquivo de rotas.
	 * 
	 * @return boolean Retorna true caso o param esteja correto ou false caso contrário
	 */
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

	/**
	 * Substitui a tag [:action:] pelo valor correspondente da rota
	 * 
	 * @return void
	 */
	protected function parseRouteAction()
	{
		$_actionPosition = array_search('[:action:]', explode('/', $this->_routeMatch['route'])) - 1;

		if (isset($this->_urlParams[$_actionPosition])) {
			$this->_routeMatch['constraints']['action'] = str_replace('[:action:]', $this->_urlParams[$_actionPosition], $this->_routeMatch['constraints']['action']);
		}
	}

	/**
	 * Substitui a tag [:param:] pelo valor correspondente da rota
	 * 
	 * @return void
	 */
	protected function parseRouteParam()
	{
		$_paramPosition = array_search('[:param:]', explode('/', $this->_routeMatch['route'])) - 1;

		if (isset($this->_urlParams[$_paramPosition])) {
			$this->_routeMatch['param']['param'] = str_replace('[:param:]', $this->_urlParams[$_paramPosition], $this->_routeMatch['param']['param']);
		}
	}

	/**
	 * Carrega o arquivo de rotas. Caso o arquivo de rotas não exista, carrega o arquivo default da pasta libs
	 * 
	 * @return array retorna rotas definidas no arquivo de configuração
	 */
	protected function loadRoutesFile()
	{
		if (file_exists(CONFIG_PATH . DS . 'Routes.php')) {
			return require(CONFIG_PATH . DS . 'Routes.php');
		}

		return require('lib' . DS . 'config' . DS . 'Routes.php');
	}
}
