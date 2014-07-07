<?php

namespace Site\Controller;
use Site\Controller\BaseController;

class IndexController extends BaseController
{
	public function indexAction()
	{
		BaseController::renderize('index');
	}
}