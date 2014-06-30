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

	/**
	 *
	 */
	static public function startAppAction()
	{
		$_router = new RouteController;
		$_route  = $_router->getRoute();

		if ($_route) {
			echo "<pre>" . print_r($_route, 1);
		} else {
			BaseController::renderize('errors/404');
		}
	}
}