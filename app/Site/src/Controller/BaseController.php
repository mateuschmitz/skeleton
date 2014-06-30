<?php

namespace Site\Controller;

class BaseController
{
	private $_page;
	private $_template;
	private $_view;

	static protected function renderize($_page)
	{
		$_view = require('app\Site\src\View\default\\' . $_page . '.phtml');
		print_r($_view, 1);
	}
}