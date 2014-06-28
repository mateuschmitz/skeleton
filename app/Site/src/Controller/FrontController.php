<?php

namespace Site\Controller;
use Site\Controller\RouteController;
use Site\Controller\BaseController;

class FrontController extends BaseController
{
	private $_router;
	private $_route;
	private $_params;
	private $_controller;

	static public function startAppAction()
	{
		$_router = new RouteController;
		$_route  = $_router->getRoute();

		if ($_route) {
			if (empty($_route['params'])) {
				
				$_controller = $_route['constraints']['namespace'] . $_route['constraints']['controller'];
				$_controller = new $_controller;
	
				$_controller->$_route['constraints']['action']();
	
			} else {
				
				$_params = $_router->getUrlParams($_GET['_route_']);
				array_shift($_params);
	
				if (count($_params) == $_route['params']['numParams']) {
					
					$_controller = $_route['constraints']['namespace'] . $_route['constraints']['controller'];
					$_controller = new $_controller;
	
					$_controller->$_route['constraints']['action']($_params);
				} else {
					BaseController::getView('errors/404');
				}
			}
		} else {
			BaseController::getView('errors/404');
		}
	}
}