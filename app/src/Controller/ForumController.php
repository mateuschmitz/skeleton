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

/**
 * Classe IndexController
 */
class ForumController extends Controller
{
	/**
	 * Função default, exibe a home da aplicação
	 */
	public function indexAction()
	{
		// return new ViewModel(true, ['title' => 'Skeleton']);
		$conn = $this->getConnection();

		echo "ForumController->indexAction";
		
		if (func_num_args() != 0) {
			echo "<pre>" . print_r(func_get_args(), 1);
		}
	}
}