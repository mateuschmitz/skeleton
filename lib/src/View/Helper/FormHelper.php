<?php

/**
 * M2S micro-framework
 *
 * @author Mateus Schmitz matteuschmitz@gmail.com
 * @link https://github.com/mateuschmitz/skeleton
 * @license undefined
 * @package Helper
 */

namespace M2S\View\Helper;

/**
 * Classe FormHelper
 */
class FormHelper
{
	public function __construct()
	{
	}

	public function link($link, $href)
	{
		echo "<a href='$href'>$link</a>";
	}
}