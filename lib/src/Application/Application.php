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

class Application
{
	protected $router;
	protected $route;
	protected $controller;
	protected $action;
	protected $defaultAction;
	protected $param;

	public static function startApplication()
	{
		$router = new Router;
		$route = $router->getRoute();
	}
}