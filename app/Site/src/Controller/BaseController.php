<?php

namespace Site\Controller;

class BaseController
{
	private $_page;
	private $_template;
	private $_view;

	/**
	 * Renderiza a view
	 * 
	 * @param string $_page
	 * @param string $_template
	 * @return string 
	 */
	static protected function renderize($_page, $_template = 'default')
	{
		if (file_exists(VIEW_PATH . DS . $_template . DS . $_page . '.phtml')) {
			
			$_view = require(VIEW_PATH . DS . $_template . DS . $_page . '.phtml');
			print_r($_view, 1);

		} else {
			
			echo 'BAD CONFIGURATION';
		}
	}
}