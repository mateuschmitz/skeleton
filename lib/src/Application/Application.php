<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Application
 */

namespace M2S\Application;

use M2S\Route\Router;

/**
 * Classe que inicia a aplicação
 */
class Application
{
	
	/**
	 * M2S\Route\Router
	 * @var object
	 */
	protected $_router         = null;
	
	/**
	 * Rota a ser executada
	 * @var array
	 */
	protected $_route          = array();
	
	/**
	 * Namespace + Controller que será instanciado
	 * @var string
	 */
	protected $_controllerName = null;
	
	/**
	 * Ação que será executada
	 * @var string
	 */
	protected $_action         = null;
	
	/**
	 * Ação default que será executada caso $_action não exista
	 * @var string
	 */
	protected $_defaultAction  = null;
	
	/**
	 * Parâmetro que, caso exista, será passado ao controlador
	 * @var string/integer
	 */
	protected $_param          = null;
	
	/**
	 * Controller instanciado
	 * @var object
	 */
	protected $_controller     = null;

	/**
	 * Inicia a aplicação, requisitando rotas, instanciando controllers, 
	 * analisando actions e parâmetros
	 * @return [type] [description]
	 */
	public static function startApplication()
	{
		$_router = new Router;
		$_route = $_router->getRoute();

		if (self::validateRouteParams($_route)) {
			$_controllerName = $_route['namespace'] . $_route['controller'];
			$_action = $_route['action'];
		} else {
			//exception
			echo "BAD CONFIGURATION";
		}

		if (isset($_route['default-action'])) {
			$_defaultAction = $_route['default-action'];
		} else {
			$_defaultAction = 'indexAction';
		}

		if (isset($_route['param'])) {
			$_param = $_route['param'];
		} else{
			$_param = null;
		}

		$_controller = new $_controllerName;

		if (method_exists($_controller, $_action)) {
			if (is_null($_param)) {
				$_controller->$_action();
			} else {
				$_controller->$_action($_param);
			}
		} else {
			if (is_null($_param)) {
				$_controller->$_defaultAction();
			} else {
				$_controller->$_defaultAction($_param);
			}
		}
	}

	/**
	 * Valida se a rota está com os parâmetros básicos
	 * @param  array $route Array com os dados da rota acessada
	 * @return boolean Retorna true caso parâmetros estejam ok e
	 * false caso contrário
	 */
	protected function validateRouteParams($route)
	{
		if (!isset($route['route'])) {
			return false;
		}

		if (!isset($route['namespace'])) {
			return false;	
		}

		if (!isset($route['controller'])) {
			return false;	
		}

		if (!isset($route['action'])) {
			return false;
		}

		return true;
	}
}
