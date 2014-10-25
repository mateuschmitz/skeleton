<?php

namespace Site\Controller;
use Site\Controller\BaseController;
use Site\View\ViewModel;

class IndexController extends BaseController
{
	public function indexAction()
	{
		$teste = ['teste' => 'teste'];
		$teste1 = ['teste1' => 'teste1'];
		return new ViewModel(true, compact('teste', 'teste1'));
	}
}