<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\View\Model\ViewModel;

class IndexController extends BaseController
{
	public function indexAction()
	{
		return new ViewModel(true, ['title' => 'Skeleton']);
	}
}