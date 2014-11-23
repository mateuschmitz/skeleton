<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Controller
 */

namespace App\Controller;

use M2S\Controller\AbstractController;
use M2S\View\ViewModel;

/**
 * Classe IndexController
 */
class IndexController extends AbstractController
{
	/**
	 * Função default, exibe a home da aplicação
	 */
	public function indexAction()
	{
		// if ($this->request->methodIs('get')) {
		// 	return new ViewModel(true, ['title' => 'Skeleton']);
		// }

		// echo "Requisição incorreta";
		// $conn = $this->getConnection();

		// echo "IndexController->indexAction";
		
		// if (func_num_args() != 0) {
		// 	echo "<pre>" . print_r(func_get_args(), 1);
		// }
		$view = new ViewModel(false);
		$view->addHelper(array('Form' => 'FormHelper'));
		// echo "<pre>" . print_r($view->getHelper(), 1);
		$view->render();
	}
}