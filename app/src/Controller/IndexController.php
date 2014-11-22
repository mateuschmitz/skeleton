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

use M2S\Controller\Controller;
use M2S\View\ViewModel;

/**
 * Classe IndexController
 */
class IndexController extends Controller
{
	/**
	 * Função default, exibe a home da aplicação
	 */
	public function indexAction()
	{
		if ($this->request->methodIs('get')) {
			return new ViewModel(true, ['title' => 'Skeleton']);
		}

		echo "Requisição incorreta";
		// $conn = $this->getConnection();

		// echo "IndexController->indexAction";
		
		// if (func_num_args() != 0) {
		// 	echo "<pre>" . print_r(func_get_args(), 1);
		// }
	}
}