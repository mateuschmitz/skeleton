<?php

namespace Site\Controller;
use Site\Controller\BaseController;

class TesteController extends BaseController
{
	public function indexAction($param = array())
	{
		BaseController::renderize('teste');
	}
}