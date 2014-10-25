<?php

namespace Site\View;

class ViewModel
{
	protected $layout;
	protected $view;
	protected $dataView;
	protected $layoutFile;
	protected $contentView;

	public function __construct($autoRender = true, $data = array()) {

		$this->layout     = 'default';
		$this->autoRender = $autoRender;

		if ($this->autoRender) {
			$this->render();
		}
		echo "<pre>" . print_r($data, 1);
	}

	public function render($view = 'index') {

		$this->view        = $view;
		$this->layoutFile  = self::getLayoutFile();
		$this->contentView = self::getContentView();

		return $this->layoutFile;
	}

	public function setVariable($variableName, $variableContent) {
		$this->$variableName = $variableContent;
	}

	public function setLayout($newLayout) {
		$this->layout = $newLayout;
	}

	public function getLayout() {
		return $this->layout;
	}

	public function content() {
		return $this->contentView;
	}

	protected function getLayoutFile () {
		return require(VIEW_PATH . DS . "_layout" . DS . $this->layout . DS . "layout.phtml");
	}

	protected function getContentView () {
		return require(VIEW_PATH . DS . "_layout" . DS . $this->layout . DS . $this->view . ".phtml");
	}
}