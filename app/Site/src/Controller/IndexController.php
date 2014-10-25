<?php

namespace Site\Controller;
use Site\Controller\BaseController;
use Site\Model\View\ViewModel;

class IndexController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel(true, ['title' => 'Skeleton']);
	}
}