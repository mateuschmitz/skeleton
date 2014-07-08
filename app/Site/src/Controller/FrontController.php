<?php

namespace Site\Controller;

use Site\Controller\RouteController;
use Site\Controller\BaseController;

class FrontController extends BaseController
{
	private $_router;
	private $_route;
	private $_controller;
	private $_action;

	/**
	 * Inicia a aplicação
	 */
	static public function startAppAction()
	{
		$_router = new RouteController;
		$_route  = $_router->getRoute();

		if ($_route) {
			
			$_controller = $_route['constraints']['namespace'] . $_route['constraints']['controller'];
			$_controller = new $_controller;

			$_action = method_exists($_controller, $_route['constraints']['action']) ? 
							$_route['constraints']['action'] : 
							$_route['default']['action'];

			if (empty($_route['param']['param'])) {
				$_controller->$_action();
			} else {
				$_controller->$_action($_route['param']);
			}

		} else {
			BaseController::render('errors' . DS . '404');
		}
	}
}