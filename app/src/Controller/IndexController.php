<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\View\Model\ViewModel;

class IndexController extends BaseController
{
	/**
	 * Função default, exibe a home do skeleton
	 */
	public function indexAction()
	{
		return new ViewModel(true, ['title' => 'Skeleton']);
	}
}