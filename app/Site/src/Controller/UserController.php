<?php

namespace Site\Controller;
use Site\Controller\BaseController;

class UserController extends BaseController
{
	public function indexAction()
	{
		BaseController::render('user');
	}
}