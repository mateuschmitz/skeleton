<?php

namespace Site\Controller;

class UserController
{
	private $_username;

	/**
	 * 
	 * 
	 */
	public function indexAction($_username = array())
	{
		$this->_username = $_username;

		if (empty($this->_username)) {
			Site\Controller\RouteController::redirectToRoute('default');
		}

		echo 'Parametro: ' . $this->_username[0];
	}
}