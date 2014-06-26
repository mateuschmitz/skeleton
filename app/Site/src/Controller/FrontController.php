<?php

namespace Site\Controller;
use Site\Controller\RouteController;

class FrontController
{
	private $route;

	static public function indexAction()
	{
		$route = new RouteController;
		$ro = $route->getRoute();
		echo "<pre>" . print_r($ro, 1);
	}
}