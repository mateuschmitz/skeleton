<?php

namespace Site\Controller;

class TesteController
{
	public function indexAction($param = array())
	{
		if (empty($param)) {
			echo 'TesteController indexAction';
		} else {
			echo 'TesteController indexAction<br /><pre>';
			print_r($param);
		}
	}
}