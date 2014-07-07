<?php

namespace Site\Controller;
use Site\Controller\BaseController;
use Site\Model\UserModel;

class UserController extends BaseController
{
	public function indexAction($param = array())
	{
		BaseController::renderize('user');
	}
}