<?php

namespace Site\Controller;

class UserController
{
	public function indexAction($param = array())
	{
		if (empty($param)) {
			echo 'UserController indexAction';
		} else {
			echo 'UserController indexAction<br /><pre>';
			print_r($param);
		}
	}
}